<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class emailContributors extends Notification implements ShouldQueue
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

    public $year;

    public function __construct($message, $sender, $name, $year)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->name = $name;
        $this->year = $year;
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
                    ->line($this->name)
                    // ->line('<br>')
                    ->line(''.$this->message)
                    ->action('Click to View Publication', url('https://pris.dpr.gov.ng/publication/nogiar/approve?year='.$this->year));
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
