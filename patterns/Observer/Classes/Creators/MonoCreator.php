<?php

namespace Patterns\Observer\Classes\Creators;

use Patterns\Observer\Classes\Creators\Abstract\PaymentFactory;
use Patterns\Observer\Classes\Payments\Mono;
use Patterns\Observer\Classes\Payments\Privat24;
use Patterns\Observer\Interfaces\PaymentContract;

class MonoCreator extends PaymentFactory
{

    protected function getPaymentSystem(): PaymentContract
    {
        return new Mono();
    }
}