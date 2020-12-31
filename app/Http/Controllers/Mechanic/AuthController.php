<?php

namespace App\Http\Controllers\Mechanic;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userRepo;

    public function __construct( UserRepository $a ) {
        $this->userRepo = $a;
    }

    public function auth( Request $request ) {}

    public function authSocial( Request $request ) {}

    public function register( Request $request ) {}

    public function registerSocial( Request $request ) {}

    public function forgotPassword( Request $request ) {}

    public function confirmResetPassword( Request $request ) {}

    public function resetPassword( Request $request ) {}

}
