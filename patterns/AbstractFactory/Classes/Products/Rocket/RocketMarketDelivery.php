<?php

namespace Patterns\AbstractFactory\Classes\Products\Rocket;

class RocketMarketDelivery implements \Patterns\AbstractFactory\Contracts\MarketDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with ' . __CLASS__ . ' from market');
    }
}
