<?php

namespace Patterns\AbstractFactory\Classes\Products\Glovo;

class GlovoRestaurantDelivery implements \Patterns\AbstractFactory\Contracts\RestaurantDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with Glovo from restaurant');
    }
}
