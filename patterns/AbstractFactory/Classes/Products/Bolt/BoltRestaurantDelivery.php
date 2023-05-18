<?php

namespace Patterns\AbstractFactory\Classes\Products\Bolt;

class BoltRestaurantDelivery implements \Patterns\AbstractFactory\Contracts\RestaurantDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with Bolt from restaurant');
    }
}
