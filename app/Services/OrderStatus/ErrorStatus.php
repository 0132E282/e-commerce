<?php

namespace App\Services\OrderStatus;

use App\Services\OrderStatus\OrderStatusStrategy;

class ErrorStatus implements OrderStatusStrategy
{

    function handle($order)
    {
        $order->order_items->each(function ($item) {
            $productsVariation = $item->variation;
            $productsVariation->update(['quantity' => $item->quantity + $productsVariation->quantity]);
        });
        $order->update(['status' => 0]);
        return $order;
    }
}
