<?php

namespace Patterns\FactoryMethod\Classes\Creators;

use Patterns\FactoryMethod\Classes\Creators\Abstract\PaymentFactory;
use Patterns\FactoryMethod\Classes\Payments\Mono;
use Patterns\FactoryMethod\Classes\Payments\Privat24;
use Patterns\FactoryMethod\Interfaces\PaymentContract;

class MonoCreator extends PaymentFactory
{

    protected function getPaymentSystem(): PaymentContract
    {
        return new Mono();
    }
}