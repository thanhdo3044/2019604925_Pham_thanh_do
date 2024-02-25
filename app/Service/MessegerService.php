<?php

namespace App\Service;

use App\Interfaces\NotificationInterface;
use App\Models\Notification;
use Pusher\Pusher;

class MessegerService implements NotificationInterface
{
    public function sendMessage($bookingId, $messege)
    {
        $this->pusherWeb()->trigger("admin-notification-3", 'notification-event-test', $messege );

        Notification::create([
            'booking_id' => $bookingId,
            'messege' => $messege
        ]);
    }

    public function pusherWeb()
    {
        $pusher = new Pusher(config('broadcasting.connections.pusher.key'), config('broadcasting.connections.pusher.secret'), config('broadcasting.connections.pusher.app_id'), [
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            'useTLS' => config('broadcasting.connections.pusher.options.useTLS'),
        ]);
        return $pusher;
    }
}
