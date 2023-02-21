<?php

namespace App\Notifications\Company;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLeaveRequest extends Notification
{
    use Queueable;

    public $leaveRequest;

    public $organization_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($leaveRequest, $organization_id)
    {
        $this->leaveRequest = $leaveRequest;
        $this->organization_id = $organization_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if (checkMailConfig()) {
            return ['database', 'mail'];
        }else {
            return ['database'];
        }
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
            ->line(auth()->user()->name.' send a leave request')
            ->action('View Request', route('organization.leaveRequests.index', ['id' => $this->leaveRequest->id]))
            ->line('Thank you for using our application!');
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
            'message' => auth()->user()->name.' send a leave request',
            'url' => route('organization.leaveRequests.index', ['id' => $this->leaveRequest->id]),
            'organization_id' => $this->organization_id,
        ];
    }
}
