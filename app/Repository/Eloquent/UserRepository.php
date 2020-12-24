<?php

namespace App\Repository\Eloquent;

use App\Exceptions\UserBannedException;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model) {
        parent::__construct($model);
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
                // Revoke all tokens...
                $user->tokens()->delete();

                // Generate new one
                $token = $user->createToken('authToken');

                Auth::setUser( $user );
                return $token->plainTextToken;
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
    public function loginGoogle( $token ): ?string {
        return null;
    }

    /**
     * @return null|string
     */
    public function loginFacebook( $token ): ?string {
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