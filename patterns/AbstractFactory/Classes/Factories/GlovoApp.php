<?php

namespace Patterns\AbstractFactory\Classes\Factories;

use Patterns\AbstractFactory\Classes\Products\Glovo\GlovoMarketDelivery;
use Patterns\AbstractFactory\Classes\Products\Glovo\GlovoPharmacyDelivery;
use Patterns\AbstractFactory\Classes\Products\Glovo\GlovoRestaurantDelivery;
use Patterns\AbstractFactory\Contracts\MarketDeliveryContract;
use Patterns\AbstractFactory\Contracts\PharmacyDeliveryContract;
use Patterns\AbstractFactory\Contracts\RestaurantDeliveryContract;

class GlovoApp implements \Patterns\AbstractFactory\Contracts\DeliveryAppContract
{

    public function restaurantDelivery(): RestaurantDeliveryContract
    {
        return new GlovoRestaurantDelivery();
    }

    public function marketDelivery(): MarketDeliveryContract
    {
        return new GlovoMarketDelivery();
    }

    public function pharmacyDelivery(): PharmacyDeliveryContract
    {
        return new GlovoPharmacyDelivery();
    }
}