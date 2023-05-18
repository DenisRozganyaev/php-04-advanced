<?php

namespace Patterns\FactoryMethod\Interfaces;

interface PaymentContract
{
    public function doPayment(float $total): void;
}