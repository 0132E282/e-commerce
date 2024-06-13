<?php

namespace App\Services\OrderStatus;

interface OrderStatusStrategy
{
    function handle($order);
}
