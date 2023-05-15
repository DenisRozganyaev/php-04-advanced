<?php

class Calc
{
    public function increment(int $number): int
    {
        return ++$number;
    }
}

class NewCalc extends Calc
{
    public function increment(int $number): int
    {
        $number = parent::increment($number);

        return --$number;
    }
}

$balance = -5;
$calc = new NewCalc();
$balance = $calc->increment($balance);
$balance = $calc->increment($balance);
$balance = $calc->increment($balance);
$balance = $calc->increment($balance);

dd($balance);
