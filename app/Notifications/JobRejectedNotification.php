<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class JobRejectedNotification extends Notification
{
    use Queueable;

    protected Job $job;

    /**
     * Create a new notification instance.
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Delivery channels
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Data stored in notifications table
     */
    public function toDatabase($notifiable): array
    {
        return [
            'job_id' => $this->job->id,
            'title' => $this->job->title,
            'message' => 'Your job post has been rejected.',
            'reason' => $this->job->rejection_reason,
            'url' => route('jobs.show', $this->job->id), 

        ];
    }

    /**
     * Fallback representation
     */
    public function toArray($notifiable): array
    {
        return $this->toDatabase($notifiable);
    }
}