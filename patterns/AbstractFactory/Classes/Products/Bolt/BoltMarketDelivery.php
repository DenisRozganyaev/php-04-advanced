<?php

namespace Patterns\AbstractFactory\Classes\Products\Bolt;

class BoltMarketDelivery implements \Patterns\AbstractFactory\Contracts\MarketDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with Bolt from market');
    }
}
