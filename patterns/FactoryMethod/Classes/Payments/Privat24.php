<?php

namespace Patterns\FactoryMethod\Classes\Payments;

use Patterns\FactoryMethod\Interfaces\PaymentContract;

class Privat24 implements PaymentContract
{

    public function doPayment(float $total): void
    {
        d("Payment {$total} from " . __CLASS__);
    }
}