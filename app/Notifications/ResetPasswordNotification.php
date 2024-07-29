<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Helpers\TokenHelper;

class ResetPasswordNotification extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // Mã hóa token và email
        $encryptedData = TokenHelper::encrypt($this->token, $notifiable->email);

        return (new MailMessage)
            ->subject('Reset Password Notification')
            ->line('You are receiving this email because we received a password reset request for your profile.')
            ->action('Reset Password', url(config('app.url') . route('password.reset', ['data' => $encryptedData], false)))
            ->line('If you did not request a password reset, no further action is required.');
    }
}
