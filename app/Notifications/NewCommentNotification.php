<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Comment;

class NewCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Comment on Your Post')
            ->greeting('Hello ' . $notifiable->name)
            ->line('A new comment was added to your post: ' . $this->comment->post->title)
            ->line('Comment: "' . $this->comment->content . '"')
            ->action('View Post', url(route('posts.show', $this->comment->post_id)))
            ->line('Thank you for using our application!');
    }
}
