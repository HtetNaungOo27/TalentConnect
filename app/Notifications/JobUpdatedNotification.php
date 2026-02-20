<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class JobUpdatedNotification extends Notification
{
    use Queueable;
    protected $job;

    /**
     * Create a new notification instance.
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
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

   public function toDatabase($notifiable): array
{
    return [
        'job_id' => $this->job->id,
        'title' => $this->job->title,
        'employer_name' => $this->job->user->name,
        'message' => "{$this->job->user->name} resubmitted '{$this->job->title}' for review.",
        'url' => route('jobs.show', $this->job->id),
    ];
}

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return $this->toDatabase($notifiable);
    }
}
