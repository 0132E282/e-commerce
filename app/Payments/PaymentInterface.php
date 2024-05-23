<?php

namespace App\Payments;


interface PaymentInterface
{
    function atm($amount, $order_id,  $content_order = null);
}
