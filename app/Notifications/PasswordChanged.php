<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordChanged extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Votre mot de passe a été changé avec succès.')
                    ->line('Si vous n\'avez pas effectué ce changement, veuillez contacter notre support immédiatement.')
                    ->action('Accéder à votre compte', url('/login'))
                    ->line('Merci d\'utiliser notre application!');
    }
}
