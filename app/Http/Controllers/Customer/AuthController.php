<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth( Request $request ) {}

    public function loginSocial( Request $request ) {}

    public function register( Request $request ) {}

    public function registerSocial( Request $request ) {}

    public function forgotPassword( Request $request ) {}

    public function confirmResetPassword( Request $request ) {}

    public function resetPassword( Request $request ) {}
    
}
