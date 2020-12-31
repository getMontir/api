<?php

namespace App\Auth\Facades;

use App\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Password as FacadesPassword;

/**
 * @method static mixed reset(array $credentials, \Closure $callback)
 * @method static \App\Auth\Contracts\PasswordResetContract sendResetLink(array $credentials)
 * @method static \Illuminate\Contracts\Auth\CanResetPassword getUser(array $credentials)
 * @method static string createToken(\Illuminate\Contracts\Auth\CanResetPassword $user)
 * @method static void deleteToken(\Illuminate\Contracts\Auth\CanResetPassword $user)
 * @method static bool tokenExists(\Illuminate\Contracts\Auth\CanResetPassword $user, string $token)
 * @method static bool otpExists(\Illuminate\Contracts\Auth\CanResetPassword $user, string $otp)
 * @method static \Illuminate\Auth\Passwords\TokenRepositoryInterface getRepository()
 * 
 * @see \App\Auth\PasswordBroker
 */
class Password extends FacadesPassword {

    public static function otpExists(CanResetPassword $user, string $otp) {
        return self::getRepository()->otpExists($user, $otp);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth.password';
    }
}