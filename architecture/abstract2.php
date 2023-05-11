<?php

class PaymentProcess
{
    public function makePayment(PaymentSystem $system)
    {
        $system->pay();
    }
}

interface PaymentSystem
{
    public function pay(): void;
}

class Privat24 implements PaymentSystem
{
    public function pay(): void
    {
        echo 'Pay from privat';
    }
}

class PayPal implements PaymentSystem
{
    public function pay(): void
    {
        echo 'Pay from PayPal';
    }
}

$paymentProcess = new PaymentProcess();
$paymentProcess->makePayment(new Privat24());
$paymentProcess->makePayment(new PayPal());
