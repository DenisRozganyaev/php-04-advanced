<?php

namespace Patterns\Observer\Interfaces;

interface PaymentContract
{
    public function doPayment(float $total): void;
}