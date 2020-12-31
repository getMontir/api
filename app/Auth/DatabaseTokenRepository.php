<?php

namespace App\Auth;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\DatabaseTokenRepository as DatabaseTokenRepositoryBase;
use Illuminate\Support\Str;

class DatabaseTokenRepository extends DatabaseTokenRepositoryBase {

    protected function createNewOtp() {
        $randomString = rand(1000, 9999);
        $otp = $randomString;
        $find = $this->getTable()
            ->where('otp', $otp)
            ->first();
        if( !empty($find) ) {
            return $this->createNewOtp();
        }

        return $otp;
    }

    public function create(CanResetPasswordContract $user) {
        $email = $user->getEmailForPasswordReset();
        $this->deleteExisting($user);
        $token = $this->createNewToken();
        $this->getTable()->insert($this->getPayload($email, $token));
        return $token;
    }

    protected function getPayload($email, $token) {
        $otp = $this->createNewOtp();
        return [
            'email' => $email, 
            'otp' => $otp,
            'token' => $this->hasher->make($token), 
            'created_at' => new Carbon()
        ];
    }

    public function exists(CanResetPasswordContract $user, $token) {
        $record = (array) $this->getTable()
            ->where('email', $user->getEmailForPasswordReset())
            ->first();
        return $record &&
               ! $this->tokenExpired($record['created_at']) &&
                 $this->hasher->check($token, $record['token']);
    }
}