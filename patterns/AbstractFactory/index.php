<?php
/**
 * Service which will be work with different deliveries
 *
 * Delivery Kind/Service | Glovo | Bolt | Rocket
 * -----------------------------------------------------------------
 * Market                |   *   |   *  |   *
 * Restaurant            |   *   |   *  |   *
 * Pharmacy              |   *   |   *  |   *
 *
 * Product Interfaces: MarketDeliveryContract | RestaurantDeliveryContract | PharmacyDeliveryContract
 * Factories Interface: DeliveryAppContract
 */


function getDeliveryApp(string $type): \Patterns\AbstractFactory\Contracts\DeliveryAppContract
{
    $factories = [
        'glovo' => \Patterns\AbstractFactory\Classes\Factories\GlovoApp::class,
        'bolt' => \Patterns\AbstractFactory\Classes\Factories\BoltApp::class,
        'rocket' => \Patterns\AbstractFactory\Classes\Factories\RocketApp::class
    ];

    if (!array_key_exists($type, $factories)) {
        throw new Exception('Invalid Delivery Factory Type');
    }

    return new $factories[$type]();
}

function showDeliveryTypes(\Patterns\AbstractFactory\Contracts\DeliveryAppContract $deliveryApp)
{
    ($deliveryApp->restaurantDelivery())->calcDelivery();
    ($deliveryApp->marketDelivery())->calcDelivery();
    ($deliveryApp->pharmacyDelivery())->calcDelivery();
}

$type = 'bolt';

$delivery = getDeliveryApp($type);

showDeliveryTypes($delivery);

$type = 'glovo';

$delivery = getDeliveryApp($type);

showDeliveryTypes($delivery);
