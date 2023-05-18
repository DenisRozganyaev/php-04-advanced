<?php

use Patterns\FactoryMethod\Classes\Creators\{
    Abstract\PaymentFactory,
    Privat24Creator,
    MonoCreator
};

function makePayment(PaymentFactory $factory, float $total = 0.01)
{
    $factory->pay($total);
}

$formValue = 'poomb';

function getPaymentFactory(string $type): PaymentFactory
{
    $factories = [
        'privat24' => Privat24Creator::class,
        'mono' => MonoCreator::class
    ];

    if (!array_key_exists($type, $factories)) {
        throw new Exception('Invalid Payment Factory Type');
    }

    return new $factories[$type]();
}

$paymentFactory = getPaymentFactory($formValue);

makePayment($paymentFactory);
