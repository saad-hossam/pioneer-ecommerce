<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Ichtrojan\Otp\Otp;

class SendOtpNotify extends Notification
{
    use Queueable;

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $otp = (new Otp)->generate(
            $notifiable->email,
            'numeric',
            5,
            5
        );

        return (new MailMessage)
            ->subject('OTP Verification Code')
            ->greeting('Hello!')
            ->line('Your verification code is:')
            ->line($otp->token)
            ->line('This code will expire in 5 minutes.')
            ->line('If you did not request this code, please ignore this email.');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
