<?php

namespace App\Repository\Eloquent;

use App\Exceptions\UserBannedException;
use App\Models\User;
use App\Models\UserSocial;
use App\Repository\UserRepositoryInterface;
use App\Traits\AttachmentTrait;
use Carbon\Carbon;
use Facebook\Facebook;
use Google_Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model) {
        parent::__construct($model);
    }

    private function createGoogleClient() {
        $client = new Google_Client();
        $client->setApplicationName("Web client (Auto-created for Google Sign-in)");
        $client->setClientId( env('GOOGLE_CLIENT_ID') );
        $client->setClientSecret( env('GOOGLE_CLIENT_SECRET') );

        return $client;

    }

    private function createFacebookClient() {
        $client = new Facebook([
            'app_id' => env('FACEBOOK_CLIENT_ID'),
            'app_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'default_graph_version' => 'v4.0',
        ]);
    
        return $client;    
    }

    private function loginPayload( $role, $payload, $token, $fcmToken ): Model {
        $user = User::where('email', $payload['email'])->where('role_id', $role)->first();

        if( empty($user) ) {
            $data = new RegisterData( $role, $payload['name'], $payload['email'], null, null, $payload['picture'] );
            if( $payload['email_verified'] == 'true' ) {
                $data->emailVerified = true;
            }
            return $this->registerSocial(
                $data, $token, $fcmToken, "google", "android"
            );
        }

        return $user;
    }

    private function loginCreateToken( User $user ): string {
        // Revoke all tokens...
        $user->tokens()->delete();

        // Generate new one
        $token = $user->createToken('authToken');

        Auth::setUser( $user );
        $sanctumToken = $token->plainTextToken;

        [$id, $token] = explode('|', $sanctumToken, 2);
        var_dump($token);
        return $token;
    }

    private function loginSocial( User $user, $idToken, $fcmToken, $channel, $device ) {
        $social = UserSocial::where('channel', $channel)
            ->where('device_type', $device)
            ->where('fcm_token', $fcmToken)
            ->where('token', $idToken)
            ->first();
        if( empty($social) ) {
            $social = new UserSocial();
            $social->user_id = $user->id;
            $social->device_type = $device;
            $social->channel = $channel;
            $social->token = $idToken;
            $social->fcm_token = $fcmToken;
            $social->save();
        } else {
            $social->token = $idToken;
            $social->fcm_token = $fcmToken;
            $social->save();
        }

        return $this->loginCreateToken( $user );
    }

    private function registerSocial(
        RegisterData $data, $idToken, $fcmToken, $channel, $device
    ) {
        $user = new User();
        $user->role_id = $data->roleId;
        $user->picture_id = $data->pictureId;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->phonenumber = $data->phone;

        if( $data->emailVerified ) {
            $data->verify_token = Str::random(60);
            $data->email_verified_at = new Carbon();
        }

        $user->save();

        return $user;
    }

    /**
     * @return Collection
     */
    public function all(): Collection {
        return $this->model->all();    
    }

    /**
     * @return null|string
     */
    public function loginCustomer( $email, $password ): ?string {
        $user = $this->model->where('email', $email)->first();
        if( !empty($user) ) {
            if( $user->is_banned == 1 ) {
                throw new UserBannedException();
            }
            
            if( Hash::check($password, $user->password) ) {
                return $this->loginCreateToken( $user );
            }
        }
        return null;
    }

    /**
     * @return null|string
     */
    public function loginMechanic( $email, $password ): ?string {
        return null;
    }

    /**
     * @return null|string
     */
    public function loginStation( $email, $password ): ?string {
        return null;
    }

    /**
     * @return null|string
     */
    public function loginGoogle( $token, $fcmToken, $role ): ?string {
        $client = $this->createGoogleClient();
        $payload = $client->verifyIdToken( $token );

        if( !$payload ) {
            return abort(401, "Invalid credential from google");
        }

        $user = $this->loginPayload( $role, $payload, $token, $fcmToken );
        var_dump($user);

        return $this->loginSocial( $user, $token, $fcmToken, "google", "android" );
    }

    /**
     * @return null|string
     */
    public function loginFacebook( $token, $fcmToken, $role ): ?string {
        return null;
    }

    /**
     * @return null|string
     */
    public function registerCustomer(...$data): ?string {
        return null;
    }

    /**
     * @return null|string
     */
    public function registerMechanic(...$data): ?string {
        return null;
    }

    /**
     * @return null|string
     */
    public function registerGoogle( $token ): ?string {
        return null;
    }

    /**
     * @return null|string
     */
    public function registerFacebook( $token ): ?string {
        return null;
    }

    /**
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function forgotPassword( $email ): ?Model {
        return null;
    }

    /**
     * @return bool
     */
    public function verifyPasswordOtp( $otp ): bool {
        return false;
    }

    /**
     * @return bool
     */
    public function changePassword( Request $request ): bool {
        return false;
    }

    public function profile(): ?Model {
        return Auth::user();
    }

}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

class RegisterData {

    use AttachmentTrait;

    public $roleId;

    public $pictureId = null;

    public $name;

    public $email;

    public $password;

    public $phone;

    public $emailVerified = false;

    public function __construct(
        int $roleId,
        string $name,
        string $email,
        string $password = null,
        string $phone = null,
        string $picture = null
    ) {
        $this->roleId = $roleId;
        $this->name = $name;
        $this->email = $email;
        if( empty($password) ) {
            $this->password = bcrypt( randomPassword() );
        } else {
            $this->password = $password;
        }
        $this->phone = $phone;

        if( filter_var($picture, FILTER_VALIDATE_URL) ) {
            $pictureId = $this->uploadFromUrl( $picture );
            if( !empty($pictureId) ) {
                $this->pictureId = $pictureId->id;
            }
        } else {
            $this->pictureId = $picture;
        }
    }
}