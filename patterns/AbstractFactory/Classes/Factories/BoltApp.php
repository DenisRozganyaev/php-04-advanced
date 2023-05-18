<?php

namespace Patterns\AbstractFactory\Classes\Factories;

use Patterns\AbstractFactory\Classes\Products\Bolt\BoltMarketDelivery;
use Patterns\AbstractFactory\Classes\Products\Bolt\BoltPharmacyDelivery;
use Patterns\AbstractFactory\Classes\Products\Bolt\BoltRestaurantDelivery;
use Patterns\AbstractFactory\Contracts\MarketDeliveryContract;
use Patterns\AbstractFactory\Contracts\PharmacyDeliveryContract;
use Patterns\AbstractFactory\Contracts\RestaurantDeliveryContract;

class BoltApp implements \Patterns\AbstractFactory\Contracts\DeliveryAppContract
{

    public function restaurantDelivery(): RestaurantDeliveryContract
    {
        return new BoltRestaurantDelivery();
    }

    public function marketDelivery(): MarketDeliveryContract
    {
        return new BoltMarketDelivery();
    }

    public function pharmacyDelivery(): PharmacyDeliveryContract
    {
        return new BoltPharmacyDelivery();
    }
}