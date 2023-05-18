<?php

namespace Patterns\FactoryMethod\Classes\Creators\Abstract;

use Patterns\FactoryMethod\Interfaces\PaymentContract;

abstract class PaymentFactory
{
    abstract protected function getPaymentSystem(): PaymentContract;

    public function pay(float $total)
    {
        $system = $this->getPaymentSystem();

        d('before the payment');
        $system->doPayment($total);
        d('after the payment');
    }
}