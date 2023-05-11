<?php

// Library code

class Discount
{
    public function getDiscount(): float
    {
        return 5;
    }
}

class ExtendedDiscount extends Discount
{
    public function getDiscount(): float
    {
        if (true) {
            throw new Exception('Bad');
        }

        return parent::getDiscount() * 1.5;
    }
}



// Developer Code
$discount = new ExtendedDiscount();
d(25 - $discount->getDiscount() / 100 * 25);
