<?php

class Cat
{
    protected int $energy = 0;

    public function eat(Food $eat)
    {
        $this->energy += $eat->getNutrition();
    }

    /**
     * @return int
     */
    public function getEnergy(): int
    {
        return $this->energy;
    }
}

interface Food
{
    public function getNutrition(): int;
}

class Sausage implements Food
{
    public function getNutrition(): int
    {
        return 5;
    }
}

class Fish implements Food
{
    public function getNutrition(): int
    {
        return 15;
    }
}

$cat = new Cat();
$sausage = new Sausage();

d($cat->getEnergy());

$cat->eat($sausage);

d($cat->getEnergy());

$fish = new Fish();

$cat->eat($fish);

d($cat->getEnergy());
