<?php

namespace App\Services\OrderStatus;

use App\Models\Orders;

class OrderStatusFactory
{
    private $registerStrategy = [
        'success' => SuccessStatus::class,
        'error' => ErrorStatus::class,
    ];
    /** @param $type (string)
     *  @param $order (Models Orders)
     *  
     **/
    function make(string $type, Orders $order)
    {
        throw_if(!array_key_exists($type, $this->registerStrategy), 'type is not registered');
        $strategyClass = $this->registerStrategy[$type];
        $orderContext = new OrderContext(new $strategyClass());
        return $orderContext->applyStrategy($order);
    }
}
