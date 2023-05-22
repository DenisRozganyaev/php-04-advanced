<?php

namespace Patterns\Observer\Classes\Payments;

use Patterns\Observer\Interfaces\PaymentContract;

class Mono implements PaymentContract
{

    public function doPayment(float $total): void
    {
        d("Payment {$total} from " . __CLASS__);
    }
}