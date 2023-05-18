<?php

namespace Patterns\AbstractFactory\Contracts;

interface DeliveryAppContract
{
    public function restaurantDelivery(): RestaurantDeliveryContract;
    public function marketDelivery(): MarketDeliveryContract;
    public function pharmacyDelivery(): PharmacyDeliveryContract;
}
