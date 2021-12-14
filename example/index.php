<?php
include_once './vendor/autoload.php';

use Persec\ShopeePay\JumpApp;
use Persec\ShopeePay\JumpAppRequest;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$clientId = $_ENV['CLIENT_ID'];
$secretKey = $_ENV['SECRET_KEY'];
$merchantExId = $_ENV['MERCHANT_EX_ID'];
$storeExId = $_ENV['STORE_EX_ID'];

$requestId = time();
$amount = 2;
$currency = 'THB';
$orderNo = date('YmdHis');

$params = new JumpAppRequest([
    'request_id' => "$requestId",
    'amount' => $amount * 100,
    'currency' => $currency,
    'merchant_ext_id' => $merchantExId,
    'store_ext_id' => $storeExId,
    'payment_reference_id' => $orderNo,
    'return_url' => 'https://www.example.com/order',
    'platform_type' => 'pc'
]);

$dqr = new JumpApp($clientId, $secretKey, $merchantExId, $storeExId);
$dqr->setIsDebugRequest(true);
$dqr->setIsSandbox(true);
$res = $dqr->create($params);
var_dump($res);
