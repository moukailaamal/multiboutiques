<?php

namespace App\Notifications;

use App\Models\Command;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommandePasseeNotification extends Notification
{
    use Queueable;
    // attribut
    protected $command;


    /**
     * Create a new notification instance.
     */
    public function __construct(Command $command)
    {
        $this->command=$command;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Confirmation de votre commande')
                    ->greeting('Bonjour ' . $notifiable->name . ',')
                    ->line('Nous vous remercions pour votre commande.')
                    ->line('Votre commande a été passée avec succès et est en cours de traitement.')
                    ->line('Adresse de livraison : ' . $this->command->adresse)
                    ->line('--- Détails de la commande ---')
                    ->line($this->formatContenuCommande($this->command->contenu))
                    ->action('Voir votre commande', url('' . $this->command->id))
                    ->line('Nous vous remercions pour votre confiance.')
                    ->line('Cordialement,')
        
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
