<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    public function __construct(public string $token) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
$url = url('/reset-password/' . $this->token . '?email=' . urlencode($notifiable->email));

        return (new MailMessage)
            ->subject('Reset Password - DriveNow')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Kami menerima permintaan reset password untuk akun kamu.')
            ->action('Reset Password', $url)
            ->line('Link ini akan kadaluarsa dalam 60 menit.')
            ->line('Jika kamu tidak merasa meminta reset password, abaikan email ini.')
            ->salutation('Salam, Tim DriveNow');
    }
}