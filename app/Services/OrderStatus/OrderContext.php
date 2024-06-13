<?php

namespace App\Services\OrderStatus;

class OrderContext
{
    private $strategy;
    function __construct(OrderStatusStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
    function applyStrategy($order)
    {
        return $this->strategy->handle($order);
    }
}
