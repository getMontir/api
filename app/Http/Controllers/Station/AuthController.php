<?php

namespace App\Http\Controllers\Station;

use App\Auth\Facades\Password;
use App\Events\Station\StationLoggedIn;
use App\Exceptions\UserBannedException;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $a) {
        $this->userRepo = $a;
    }

    public function auth(Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        try {
            $token = $this->userRepo->loginStation(
                $request->input('email'),
                $request->input('password')
            );

            // Trigger Event
            $user = Auth::user();
            event( new StationLoggedIn($user) );

            return response()->json([
                'data' => $token
            ]);
        } catch( UserBannedException $e ) {
            return abort(410);
        }
    }

    public function authSocial(Request $request) {
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
            $token = $this->userRepo->loginGoogle( $idToken, $fcmToken, 5, false );
        }

        if( $channel == 'facebook' ) {
            $token = $this->userRepo->loginFacebook( $idToken, $fcmToken, 5, false );
        }

        if( !empty($token) ) {
            return response()->json([
                'data' => $token
            ]);
        }

        return abort(404);
    }

    public function forgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status->status === Password::RESET_LINK_SENT
                ? response()->json(['data' => $status->token])
                : abort(404);
    }

    public function confirmResetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'otp' => 'required|numeric|digits:4'
        ]);

        $user = Password::getUser( $request->only('email') );
        if( is_null($user) ) {
            return abort(401);
        }

        if( !Password::tokenExists( $user, $request->input('token')) ) {
            return abort(400);
        }

        if( !Password::otpExists( $user, $request->input('otp') ) ) {
            return abort(404);
        }

        // $token = Password::createToken( $user );
        $token = $request->input('token');

        return response()->json([
            'data' => $token
        ]);
    }

    public function resetPassword(Request $request) {
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
                    ? abort(400)
                    : abort(404) 
                );
    }

    public function registerContact() {
        return response()->json([
            'data' => [
                'name' => 'Subhan',
                'phone' => '087820002888'
            ]
        ]);
    }
}
