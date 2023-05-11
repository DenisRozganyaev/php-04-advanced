<?php

class Animal
{

}

class Cat extends Animal
{

}

class BengalCat extends Cat
{}


class Human {}

class Milk
{
    public function feed(Cat $cat) {}
}

class Cheese extends Milk
{
    public function feed(Human $animal)
    {
    }
}

/// Developer code
///

$cat = new Cat;
$milk = new Cheese();
$milk->feed($cat);
