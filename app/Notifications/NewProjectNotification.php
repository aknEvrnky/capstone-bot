<?php

namespace App\Notifications;

use App\Models\Advisor;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProjectNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Project $project, public Advisor $advisor)
    {
        //
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
            ->subject("{$this->project->title} from {$this->advisor->name}")
            ->greeting("Hi {$notifiable->name},")
            ->line("{$this->advisor->name} has added a new project.")
            ->line("{$this->project->title}")
            ->line("{$this->project->content}")
            ->action('View project', "https://capstone.eng.bau.edu.tr/project/{$this->project->bau_id}");
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
