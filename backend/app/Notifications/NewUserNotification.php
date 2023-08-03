<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewUserNotification extends Notification
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New User Registration')
            ->line('A new user has been registered in the system.')
            ->line('Name: ' . $this->user->name)
            //->line('Role: ' . $this->user->role)
            ->line('Email: ' . $this->user->email);
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
}

