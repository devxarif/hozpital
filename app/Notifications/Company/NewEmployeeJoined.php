<?php

namespace App\Notifications\Company;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEmployeeJoined extends Notification
{
    use Queueable;

    public $user;

    public $organization_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $organization_id)
    {
        $this->user = $user;
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
            ->line($this->user->name.' has joined')
            ->action('Details', route('organization.employees.show', $this->user->id))
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
            'message' => $this->user->name.' has joined',
            'url' => route('organization.employees.show', $this->user->id),
            'organization_id' => $this->organization_id,
        ];
    }
}
