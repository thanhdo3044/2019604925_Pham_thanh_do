<?php

namespace App\Interfaces;

interface NotificationInterface
{
    public function sendMessage($bookingId, $messege);
}
