<?php

namespace App\Mail\User;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailVerify extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    protected $otp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Otp $otp) {
        $this->user = $user;
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@getmontir.com', 'Account getMontir')
            ->subject('Kode Verifikasi Akun Anda')
            ->markdown('emails.user.verify')
            ->with([
                'name' => $this->user->name,
                'email' => $this->user->email,
                'code' => $this->otp->code,
                'expired' => $this->otp->expired->format( get_system_date_time_format() ),
                'slots' => null,
            ]);
    }
}
