<?php

namespace App\Http\Controllers\Customer;

use App\Events\Customer\CustomerLoggedIn;
use App\Exceptions\UserBannedException;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'token' => 'required|string|max:255',
            'fcm_token' => 'required|string|max:255',
            'channel' => 'required|string|in:google,facebook',
            'device' => 'required|string|in:android,os'
        ]);
    }

    public function register( Request $request ) {}

    public function registerSocial( Request $request ) {}

    public function forgotPassword( Request $request ) {}

    public function confirmResetPassword( Request $request ) {}

    public function resetPassword( Request $request ) {}

}
