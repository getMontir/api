<?php

namespace App\Http\Controllers\Mechanic;

use App\Auth\Facades\Password;
use App\Events\Mechanic\MechanicLoggedIn;
use App\Exceptions\UserBannedException;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\RegisterData;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $userRepo;

    public function __construct( UserRepository $a ) {
        $this->userRepo = $a;
    }

    public function auth( Request $request ) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        try {
            $token = $this->userRepo->loginMechanic(
                $request->input('email'),
                $request->input('password')
            );

            // Trigger Event
            $user = Auth::user();
            event( new MechanicLoggedIn($user) );

            return response()->json([
                'data' => $token
            ]);
        } catch( UserBannedException $e ) {
            return abort(410, "User banned");
        }
    }

    public function authSocial( Request $request ) {
        $request->validate([
            'token' => 'required|string',
            'fcm_token' => 'required|string',
            'channel' => 'required|string|in:google,facebook',
            'device' => 'required|string|in:android,os'
        ]);

        $idToken = $request->input('token');
        $fcmToken = $request->input('fcm_token');
        $channel = $request->input('channel');
        $deviceType = $request->input('device');

        $token = null;

        if( $channel == 'google' ) {
            $token = $this->userRepo->loginGoogle( $idToken, $fcmToken, 6 );
        }

        if( $channel == 'facebook' ) {
            $token = $this->userRepo->loginFacebook( $idToken, $fcmToken, 6 );
        }

        if( !empty($token) ) {
            return response()->json([
                'data' => $token
            ]);
        }

        return abort(401, "Bad Request");
    }

    public function register( Request $request ) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|unique:users,phonenumber',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $data = new RegisterData(
            6, $request->input('name'),
            $request->input('email'),
            $request->input('password'),
            $request->input('phone')
        );

        $token = $this->userRepo->registerMechanic( $data );

        return response()->json([
            'data' => $token
        ]);
    }

    public function registerSocial( Request $request ) {
        $idToken = $request->input('token');
        $fcmToken = $request->input('fcm_token');
        $channel = $request->input('channel');
        $deviceType = $request->input('device');

        $token = null;

        if( $channel == 'google' ) {
            $token = $this->userRepo->registerGoogle( $idToken, $fcmToken, 6 );
        }

        if( $channel == 'facebook' ) {
            $token = $this->userRepo->registerFacebook( $idToken, $fcmToken, 6 );
        }

        if( !empty($token) ) {
            return response()->json([
                'data' => $token
            ]);
        }

        return abort(401, "Bad request");
    }

    public function forgotPassword( Request $request ) {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status->status === Password::RESET_LINK_SENT
                ? response()->json(['data' => $status->token])
                : abort(404, "User not found");
    }

    public function confirmResetPassword( Request $request ) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'otp' => 'required|numeric|digits:4'
        ]);

        $user = Password::getUser( $request->only('email') );
        if( is_null($user) ) {
            return abort(401, "Invalid user");
        }

        if( !Password::tokenExists( $user, $request->input('token')) ) {
            return abort(400, "Token not exists");
        }

        if( !Password::otpExists( $user, $request->input('otp') ) ) {
            return abort(404, "Otp not exists");
        }

        // $token = Password::createToken( $user );
        $token = $request->input('token');

        return response()->json([
            'data' => $token
        ]);
    }

    public function resetPassword( Request $request ) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                $user->setRememberToken(Str::random(60));
    
                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
                ? response()->json(['data' => true])
                : ( $status === Password::INVALID_TOKEN 
                    ? abort(400, "Invalid token")
                    : abort(404, "Token not exists") 
                );
    }

}
