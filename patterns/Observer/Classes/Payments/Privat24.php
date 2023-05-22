<?php

namespace Patterns\Observer\Classes\Payments;

use Patterns\Observer\Interfaces\PaymentContract;

class Privat24 implements PaymentContract
{

    public function doPayment(float $total): void
    {
        d("Payment {$total} from " . __CLASS__);
    }
}