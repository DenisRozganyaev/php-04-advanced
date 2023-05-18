<?php

namespace Patterns\AbstractFactory\Classes\Products\Rocket;

class RocketPharmacyDelivery implements \Patterns\AbstractFactory\Contracts\PharmacyDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with ' . __CLASS__ . ' from pharmacy');
    }
}
