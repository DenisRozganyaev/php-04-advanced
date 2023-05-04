<?php

class Cat
{
    public function __construct(public string $name, protected int $age, private string $type)
    {
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getFullInfo(): array
    {
        return [
            $this->name,
            $this->age,
            $this->type
        ];
    }
}

$cat = new Cat("Semen", 2, "Bengal");
$cat2 = new Cat("Avosia", 1, "Black");

d($cat->getFullInfo());
d($cat2->getFullInfo());

class Calc
{
    static protected float $result = 0;

    public function __construct()
    {
        d(self::$result);
    }

    static public function plus(int $a, int $b)
    {
        self::$result = $a + $b;
        return self::$result;
    }

    static public function minus(int $a, int $b)
    {
        self::$result = $a - $b;
        return self::$result;
    }
}

$calc = new Calc();

d(Calc::plus(5, 3));
d(Calc::minus(5, 3));