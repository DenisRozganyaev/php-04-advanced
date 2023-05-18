<?php

namespace Patterns\AbstractFactory\Classes\Factories;

use Patterns\AbstractFactory\Classes\Products\Rocket\RocketMarketDelivery;
use Patterns\AbstractFactory\Classes\Products\Rocket\RocketPharmacyDelivery;
use Patterns\AbstractFactory\Classes\Products\Rocket\RocketRestaurantDelivery;
use Patterns\AbstractFactory\Contracts\MarketDeliveryContract;
use Patterns\AbstractFactory\Contracts\PharmacyDeliveryContract;
use Patterns\AbstractFactory\Contracts\RestaurantDeliveryContract;

class RocketApp implements \Patterns\AbstractFactory\Contracts\DeliveryAppContract
{

    public function restaurantDelivery(): RestaurantDeliveryContract
    {
        return new RocketRestaurantDelivery();
    }

    public function marketDelivery(): MarketDeliveryContract
    {
        return new RocketMarketDelivery();
    }

    public function pharmacyDelivery(): PharmacyDeliveryContract
    {
        return new RocketPharmacyDelivery();
    }
}