<?php

namespace Patterns\AbstractFactory\Classes\Products\Glovo;

class GlovoMarketDelivery implements \Patterns\AbstractFactory\Contracts\MarketDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with Glovo from market');
    }
}
