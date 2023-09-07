<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BeatSavedForLater extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    
    protected $beat;
    protected $userName;
    protected $saveTime;

    public function __construct(Beat $beat, User $username)
    {
        $this->beat = $beat;
        $this->username = $username;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    // public function via(object $notifiable): array
    // {
    //     return ['mail'];
    // }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => "Your beat '{$this->beat->title}' was saved by '{$this->username}'.",
            'beat_id' => $this->beat->id,
            'user_name' => $this->userName,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         //
    //     ];
    // }
}
