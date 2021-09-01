<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\certif;
use Illuminate\Support\Facades\Auth;

class NewCertif extends Notification
{
    use Queueable;
    private $certif;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(certif $certif)
    {
        $this->certif = $certif;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
           'id' => $this->certif->id,
           'title' => 'new certif created by :',
           'user' => Auth::user()->name,
        ];
    }
}
