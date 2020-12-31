<?php

namespace App\Http\Controllers\Mechanic;

use App\Events\Mechanic\MechanicLoggedIn;
use App\Exceptions\UserBannedException;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\RegisterData;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return abort(410);
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

    public function registerSocial( Request $request ) {}

    public function forgotPassword( Request $request ) {}

    public function confirmResetPassword( Request $request ) {}

    public function resetPassword( Request $request ) {}

}
