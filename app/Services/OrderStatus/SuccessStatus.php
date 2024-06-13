<?php

namespace App\Services\OrderStatus;

use App\Services\OrderStatus\OrderStatusStrategy;

class SuccessStatus implements OrderStatusStrategy
{

    function handle($order)
    {
        if ($order->status == 0) {
            $order->order_items->each(function ($item) {
                $productsVariation = $item->variation;
                $productsVariation->update(['quantity' =>   $productsVariation->quantity - $item->quantity]);
            });
        }
        $order->update(['status' => 1]);
        return $order;
    }
}
