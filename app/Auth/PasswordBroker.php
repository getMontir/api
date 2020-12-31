<?php

namespace App\Auth;

use App\Auth\Contracts\PasswordResetContract;
use Closure;
use Illuminate\Auth\Passwords\PasswordBroker as BasePasswordsBroker;
use Illuminate\Contracts\Auth\CanResetPassword;

class PasswordBroker extends BasePasswordsBroker {
    /**
     * Send a password reset link to a user.
     *
     * @param  array  $credentials
     * @return string
     */
    public function sendResetLink(array $credentials, Closure $callback = null)
    {
        // First we will check to see if we found a user at the given credentials and
        // if we did not we will redirect back to this current URI with a piece of
        // "flash" data in the session to indicate to the developers the errors.
        $user = $this->getUser($credentials);

        if (is_null($user)) {
            return new PasswordResetContract( static::INVALID_USER, null );
        }

        // Once we have the reset token, we are ready to send the message out to this
        // user with a link to reset their password. We will then redirect back to
        // the current URI having nothing set in the session to indicate errors.
        $token = null;
        if(!is_null($user)) {
            $token = $this->tokens->create($user);
            $user->sendPasswordResetNotification($token);
        }

        return new PasswordResetContract( static::RESET_LINK_SENT, $token );
    }

    public function otpExists(CanResetPassword $user, $otp) {
        $this->tokens->otpExists( $user, $otp );
    }
}