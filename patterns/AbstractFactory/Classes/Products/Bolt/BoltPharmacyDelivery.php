<?php

namespace Patterns\AbstractFactory\Classes\Products\Bolt;

class BoltPharmacyDelivery implements \Patterns\AbstractFactory\Contracts\PharmacyDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with Bolt from pharmacy');
    }
}
