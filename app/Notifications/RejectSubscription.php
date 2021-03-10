<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectSubscription extends Notification
{
    use Queueable;

    private $data;
    private $from;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $from)
    {
        $this->data = $data;
        $this->from = $from;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [/*'mail', */'database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->data
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from($this->from)
            ->line($this->data)
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}