<?php

namespace Patterns\Observer\Notification\Listeners;

use Patterns\Observer\Interfaces\ListenerContract;
use Patterns\Observer\Notification\Publisher\NotificationManager;
use SplSubject;

class SmsNotification implements ListenerContract
{

    public function update(NotificationManager $subject, float $total): void
    {
        d('[SMS]: your order total is ' . $total);
    }
}