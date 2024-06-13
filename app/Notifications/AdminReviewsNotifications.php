<?php

namespace App\Notifications;

use App\Models\Reviews;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminReviewsNotifications extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $content;
    protected $reviews;
    protected $title;
    public function __construct($reviews, $title, $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->reviews = $reviews;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'đánh giá',
            'content' => $this->content,
            'url' => route("admin.reviews.details", $this->reviews),
            'review' => $this->reviews,
        ];
    }
}
