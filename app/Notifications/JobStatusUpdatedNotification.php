<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class JobStatusUpdatedNotification extends Notification
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
        return ['database']; // only store in database like JobUpdatedNotification
    }

    /**
     * Store notification in database.
     */
    public function toDatabase($notifiable): array
    {
        $statusMessage = match ($this->job->status) {
            'approved' => 'approved and is now live.',
            'pending' => 'set to pending for review.',
            'rejected' => "rejected. Reason: {$this->job->rejection_reason}",
            default => "updated to status '{$this->job->status}'.",
        };

        return [
            'job_id' => $this->job->id,
            'title' => $this->job->title,
            'employer_name' => $this->job->user->name,
            'message' => "Your job '{$this->job->title}' has been {$statusMessage}",
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
