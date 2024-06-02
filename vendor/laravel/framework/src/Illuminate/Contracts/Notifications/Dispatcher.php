<?php

namespace Illuminate\Contracts\Notifications;

interface Dispatcher
{
    /**
     * Send the given notification to the given notifiable entities.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $notifiables
     * @param  mixed  $notification
     * @return void
     */
    public function send($notifiables, $notification);

    /**
     * Send the given notification immediately.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $notifiables
     * @param  mixed  $notification
     * @return void
     */
<<<<<<< HEAD
    public function sendNow($notifiables, $notification);
=======
    public function sendNow($notifiables, $notification, ?array $channels = null);
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
}
