<?php

namespace Patterns\AbstractFactory\Classes\Products\Glovo;

class GlovoPharmacyDelivery implements \Patterns\AbstractFactory\Contracts\PharmacyDeliveryContract
{

    public function calcDelivery(): void
    {
        d('Delivery with Glovo from pharmacy');
    }
}
