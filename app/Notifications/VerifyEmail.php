<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Facades\Log;

class VerifyEmail extends VerifyEmailBase
{

    public $record = [];
    //    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->view('pages.verifyemail.verify-email', [
                'verificationUrl' => $this->verificationUrl($notifiable),
                'name' => $notifiable->firstname,
                'payment_link' => $notifiable->checkoutLink,
                'password' => $notifiable->or_password,
            ]);
    }
}
