<?php

use Patterns\Observer\Classes\Creators\{
    Abstract\PaymentFactory,
    Privat24Creator,
    MonoCreator
};
use Patterns\Observer\Notification\Publisher\NotificationManager;


$sms = new \Patterns\Observer\Notification\Listeners\SmsNotification();
$telegram = new \Patterns\Observer\Notification\Listeners\TelegramNotification();
$viber = new \Patterns\Observer\Notification\Listeners\ViberNotification();

NotificationManager::getInstance()->attach($sms);
NotificationManager::getInstance()->attach($viber, Privat24Creator::class);
NotificationManager::getInstance()->attach($telegram, MonoCreator::class);

function makePayment(PaymentFactory $factory, float $total = 25.39)
{
    $factory->pay($total);
}

$formValue = 'mono';

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

