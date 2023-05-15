<?php

class Transport {}

class Car extends Transport {
    public function drive() {}
}

class Formula extends Transport {}

class Coupe extends Car {}

class FactoryCarTypeException extends Exception {}

class TransportFactory
{
    public function car($type): Car
    {
        if (!$type instanceof Car) {
            throw new FactoryCarTypeException("Wrong type value -> " . $type);
        }

        return new $type;
    }
}

class NewTransportFactoryException extends Exception {}

class NewTransportFactory extends TransportFactory
{
    public function car($type): Car
    {
        if (!$type instanceof Coupe) {
            throw new NewTransportFactoryException("Wrong type value -> " . $type::class);
        }

        return new $type;
    }
}


try {
    $factory = new NewTransportFactory();
    $factory->car(new Car());
} catch (FactoryCarTypeException $exception) {
    dd($exception->getMessage());
}