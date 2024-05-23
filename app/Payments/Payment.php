<?php

namespace App\Payments;

use App\Payments\PaymentMoMo;
use App\Payments\PaymentVnPay;
use Exception;
use Illuminate\Support\Facades\Redirect;
use PharIo\Manifest\Extension;

class Payment
{
    function initialize($payment = null, $config = null)
    {
        $config = [...$config];
        switch ($payment) {
            case 'MOMO':
                return new PaymentMoMo($config);
            case 'VN_PAY':
                return  new PaymentVnPay($config);
            default:
                return [
                    'type' => 'thanh toán khi nhận hàng',
                ];
        }
    }
    function checkout($payment, $amount, $order_id, $content_order = null)
    {
        if ($payment != null) {
            $jsonResult = $payment->atm($amount, $order_id, $content_order);
            return $jsonResult;
        } else {
            throw new Exception('không có phương thức thanh toán');
        }
    }
}
