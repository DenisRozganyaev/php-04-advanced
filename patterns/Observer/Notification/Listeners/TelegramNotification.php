<?php

namespace Patterns\Observer\Notification\Listeners;

use Patterns\Observer\Interfaces\ListenerContract;
use Patterns\Observer\Notification\Publisher\NotificationManager;
use SplSubject;

class TelegramNotification implements ListenerContract
{

    public function update(NotificationManager $subject, float $total): void
    {
        d('[Telegram]: your order total is ' . $total);
    }
}