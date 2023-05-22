<?php

namespace Patterns\Observer\Classes\Creators;

use Patterns\Observer\Classes\Creators\Abstract\PaymentFactory;
use Patterns\Observer\Classes\Payments\Privat24;
use Patterns\Observer\Interfaces\PaymentContract;

class Privat24Creator extends PaymentFactory
{

    protected function getPaymentSystem(): PaymentContract
    {
        return new Privat24();
    }
}