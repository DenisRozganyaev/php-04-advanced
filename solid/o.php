<?php
//
//class Order
//{
//    protected array $products = [];
//    protected string $shippingType;
//
//    public function setShippingType(string $type)
//    {
//        $this->shippingType = $type;
//    }
//
//    public function getTotal(): float
//    {
//        return 80.25;
//    }
//
//    public function getTotalWeight(): float
//    {
//        return 5;
//    }
//
//    public function getShippingCoast(): float
//    {
//        $total = 0;
//        if ($this->shippingType === 'ground' && $this->getTotal() <= 100) {
//            $total = max(10, $this->getTotalWeight() * 1.5);
//        }
//
//        if ($this->shippingType === 'air') {
//            $total = max(20, $this->getTotalWeight() * 3);
//        }
//
//        if ($this->shippingType === 'sea') {
//            $total = max(15, $this->getTotalWeight() * 2);
//        }
//
//        if ($this->shippingType === 'courier') {
//            $total = max(25, $this->getTotalWeight() * 3.5);
//        }
//
//        return $total;
//    }
//}


class Order
{
    protected array $products = [];
    protected Shipping $shippingType;

    public function setShippingType(Shipping $type)
    {
        $this->shippingType = $type;
    }

    public function getTotal(): float
    {
        return 80.25;
    }

    public function getTotalWeight(): float
    {
        return 15;
    }

    public function getShippingCoast(): float
    {
        return $this->shippingType->getCoast($this);
    }
}

interface Shipping
{
    public function getCoast(Order $order): float;
}

class AirShipping implements Shipping
{
    public function getCoast(Order $order): float
    {
        return max(20, $order->getTotalWeight() * 3);
    }
}

class GroundShipping implements Shipping
{
    public function getCoast(Order $order): float
    {
        return $order->getTotal() > 100 ? 0 : max(10, $order->getTotalWeight() * 1.5);
    }
}

class CourierShipping implements Shipping
{
    public function getCoast(Order $order): float
    {
        return max(30, $order->getTotalWeight() * 3.5);
    }
}

$order = new Order();
$order->setShippingType(new AirShipping());
d($order->getShippingCoast());

$order->setShippingType(new GroundShipping());
d($order->getShippingCoast());

$order->setShippingType(new CourierShipping());
d($order->getShippingCoast());
