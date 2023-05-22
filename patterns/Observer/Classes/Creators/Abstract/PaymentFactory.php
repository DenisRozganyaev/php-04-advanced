<?php

namespace Patterns\Observer\Classes\Creators\Abstract;

use Patterns\Observer\Interfaces\PaymentContract;
use Patterns\Observer\Notification\Publisher\NotificationManager;

abstract class PaymentFactory
{
    abstract protected function getPaymentSystem(): PaymentContract;

    public function pay(float $total)
    {
        $system = $this->getPaymentSystem();

        d('before the payment');
        $system->doPayment($total);
        NotificationManager::getInstance()->notify(static::class, $total);
    }
}