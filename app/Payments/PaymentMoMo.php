<?php

namespace App\Payments;

use Exception;
use Nette\Utils\Random;

class PaymentMoMo implements PaymentInterface
{
    protected $inputData;
    protected $secretKey;
    protected $endpoint;
    function __construct($config = null)
    {
        $this->secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $this->endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $this->inputData['accessKey'] = 'klm05TvNBzhg7h7j';
        $this->inputData['amount'] = $req['amount'] ?? '';
        $this->inputData['extraData'] = '';
        $this->inputData['ipnUrl'] = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $this->inputData['orderId'] = $req['order_id'] ?? '';
        $this->inputData['orderInfo'] = $req['content_order'] ?? '';
        $this->inputData['partnerCode'] = 'MOMOBKUN20180529';
        $this->inputData['redirectUrl'] = $config['redirect_url'];
        $this->inputData['requestId'] = time() . "";
        $this->inputData['requestType'] = "payWithATM";
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function atm($amount, $order_id, $content_order = null)
    {
        $this->inputData['amount'] = $amount;
        $this->inputData['orderId'] =  $order_id;
        $this->inputData['orderInfo'] = $content_order;
        $rawHash = collect($this->inputData)->reduce(function ($hash, $data, $key) {
            return $hash .= $key . '=' . $data . '&';
        }, '');

        $rawHash = trim($rawHash, '&');

        $signature = hash_hmac("sha256", $rawHash, $this->secretKey);

        // dữ liệu gữi đi 
        $data = array(
            'partnerCode' => $this->inputData['partnerCode'],
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $this->inputData['requestId'],
            'amount' =>  $this->inputData['amount'],
            'orderId' =>   $this->inputData['orderId'],
            'orderInfo' => $this->inputData['orderInfo'],
            'redirectUrl' =>   $this->inputData['redirectUrl'],
            'ipnUrl' => $this->inputData['ipnUrl'],
            'lang' => 'vi',
            'extraData' => $this->inputData['extraData'],
            'requestType' => $this->inputData['requestType'],
            'signature' => $signature
        );
        $returnData = $this->execPostRequest($this->endpoint, json_encode($data));
        return json_decode($returnData, true);
    }
}
