<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PlanPurchase extends Notification
{
    use Queueable;

    public $admin_name;

    public $organization_name;

    public $plan_name;

    public $order_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admin_name, $plan_name, $organization_name, $order_id)
    {
        $this->admin_name = $admin_name;
        $this->organization_name = $organization_name;
        $this->plan_name = $plan_name;
        $this->order_id = $order_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->subject(ucfirst($this->organization_name).' has been subscribed the '.ucfirst($this->plan_name).' plan!')
            ->greeting('Hello, '.$this->admin_name)
            ->line(ucfirst($this->organization_name).' has subscribed the '.ucfirst($this->plan_name).' Plan!')
            ->action('View Order', route('orders.show', $this->order_id))
            ->line('Regards,')
            ->salutation(config('app.name'));
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
            'message' => ucfirst($this->organization_name).' has been purchased the '.ucfirst($this->plan_name).' plan!',
            'url' => route('orders.show', $this->order_id),
        ];
    }
}
