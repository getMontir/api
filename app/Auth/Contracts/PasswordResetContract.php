<?php

namespace App\Auth\Contracts;

class PasswordResetContract {

    public $status;

    public $token;

    public function __construct( $status, $token ) {
        $this->status = $status;
        $this->token = $token;
    }
}