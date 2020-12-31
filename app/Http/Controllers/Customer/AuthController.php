<?php

namespace App\Http\Controllers\Customer;

use App\Events\Customer\CustomerLoggedIn;
use App\Exceptions\UserBannedException;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\RegisterData;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    
    protected $userRepo;

    public function __construct(
        UserRepository $a
    ) {
        $this->userRepo = $a;
    }

    public function auth( Request $request ) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        try {
            $token = $this->userRepo->loginCustomer(
                $request->input('email'),
                $request->input('password')
            );

            // Trigger Event
            $user = Auth::user();
            event( new CustomerLoggedIn($user) );

            return response()->json([
                'data' => $token
            ]);
        } catch( UserBannedException $e ) {
            return abort(410);
        }
    }

    public function loginSocial( Request $request ) {
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
            $token = $this->userRepo->loginGoogle( $idToken, $fcmToken, 4 );
        }

        if( $channel == 'facebook' ) {
            $token = $this->userRepo->loginFacebook( $idToken, $fcmToken, 4 );
        }

        if( !empty($token) ) {
            return response()->json([
                'data' => $token
            ]);
        }

        return abort(401);
    }

    public function register( Request $request ) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|unique:users,phonenumber',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $data = new RegisterData(
            4, $request->input('name'),
            $request->input('email'),
            $request->input('password'),
            $request->input('phone')
        );

        $token = $this->userRepo->registerCustomer( $data );

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
            $token = $this->userRepo->registerGoogle( $idToken, $fcmToken, 4 );
        }

        if( $channel == 'facebook' ) {
            $token = $this->userRepo->registerFacebook( $idToken, $fcmToken, 4 );
        }

        if( !empty($token) ) {
            return response()->json([
                'data' => $token
            ]);
        }

        return abort(401);
    }

    public function forgotPassword( Request $request ) {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status->status === Password::RESET_LINK_SENT
                ? response()->json(['data' => $status->token])
                : abort(404);
    }

    public function confirmResetPassword( Request $request ) {}

    public function resetPassword( Request $request ) {}

}
