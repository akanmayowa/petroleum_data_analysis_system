<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class emailVerification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // public $receiver;
    public $message;

    public $sender;

    public $name;

    public $urlToView;

    public function __construct($message, $sender, $name, $urlToView)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->name = $name;
        $this->urlToView = $urlToView;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from($this->sender)
                    ->subject('PRIS Notification')
                    ->line('Dear '.$this->name)
                    ->line(' '.$this->message)
                    ->action('Click Here to verify', url($this->urlToView));
        //->line('Have A Lovely Day!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
