<?php

namespace Patterns\AbstractFactory\Classes\Products\Rocket;

class RocketRestaurantDelivery implements \Patterns\AbstractFactory\Contracts\RestaurantDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with ' . __CLASS__ . ' from restaurant');
    }
}
