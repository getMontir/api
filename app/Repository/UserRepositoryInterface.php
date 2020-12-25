<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface UserRepositoryInterface {
    public function all(): Collection;
    public function loginCustomer( $email, $password ): ?string;
    public function loginMechanic( $email, $password ): ?string;
    public function loginStation( $email, $password ): ?string;
    public function loginGoogle( $token, $fcmToken, $role ): ?string;
    public function loginFacebook( $token, $fcmToken, $role ): ?string;
    public function registerCustomer(...$data): ?string;
    public function registerMechanic(...$data): ?string;
    public function registerGoogle( $token ): ?string;
    public function registerFacebook( $token ): ?string;
    public function forgotPassword( $email ): ?Model;
    public function verifyPasswordOtp( $otp ): bool;
    public function changePassword( Request $request ): bool;
}