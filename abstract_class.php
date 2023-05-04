<?php

abstract class Transport
{
    public int $speed = 0;

    public function drive()
    {
        if ($this->maxSpeed() < $this->speed) {
            throw new Exception('It is a max');
        }
    }

    abstract protected function maxSpeed(): int;
}

class Bike extends Transport
{
    public function maxSpeed(): int
    {
        return 30;
    }
}

class Car extends Transport
{
    //...
    public function maxSpeed(): int
    {
        return 200;
    }
}

