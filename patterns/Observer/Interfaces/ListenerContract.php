<?php

namespace Patterns\Observer\Interfaces;

use Patterns\Observer\Notification\Publisher\NotificationManager;
use SplSubject;

interface ListenerContract
{
    public function update(NotificationManager $subject, float $total): void;
}