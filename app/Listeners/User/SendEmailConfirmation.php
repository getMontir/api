<?php

namespace App\Listeners\User;

use App\Events\User\UserRegistered;
use App\Mail\User\MailVerify;
use App\Notifications\User\VerifyAccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
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
            $otp = createOtpCode( $user->email, $user, ( 60 * 24 ) );
            // Notification::sendNow( $user, new VerifyAccount( $user, $otp, ( 60 * 24 ) ) );
            Mail::to( $user )->send( new MailVerify( $user, $otp ) );
        }
    }
}
