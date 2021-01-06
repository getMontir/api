<?php

namespace App\Repository;

use App\Repository\Eloquent\RegisterData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface UserRepositoryInterface {
    public function all(): Collection;
    public function loginCustomer( $email, $password ): ?string;
    public function loginMechanic( $email, $password ): ?string;
    public function loginStation( $email, $password ): ?string;
    public function loginGoogle( $token, $fcmToken, $role, $autoRegister = true ): ?string;
    public function loginFacebook( $token, $fcmToken, $role, $autoRegister = true ): ?string;
    public function registerCustomer( RegisterData $data ): ?string;
    public function registerMechanic( RegisterData $data): ?string;
    public function registerGoogle( $token, $fcmToken, $role ): ?string;
    public function registerFacebook( $token, $fcmToken, $role ): ?string;
    public function forgotPassword( $email ): ?Model;
    public function verifyPasswordOtp( $otp ): bool;
    public function changePassword( Request $request ): bool;
}