<?php

namespace App\Listeners\User;

use App\Events\User\UserRegistered;
use App\Mail\User\MailVerify;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendEmailConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $otp = createOtpCode( $user->email, $user );
            Notification::send( $user, new MailVerify( $user, $otp, ( 60 * 24 ) ) );
        }
    }
}
