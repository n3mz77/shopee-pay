<?php

namespace Persec\ShopeePay;

use Persec\ShopeePay\Exceptions\RequestException;
use Persec\ShopeePay\Exceptions\RuntimeException;

class ShopeePay
{
    private $isDebug;
    private $isSandbox;
    protected $clientId;
    protected $secretKey;
    protected $merchantExId;
    protected $storeExId;

    public function __construct($clientId, $secretKey, $merchantExId, $storeExId)
    {
        $this->clientId = $clientId;
        $this->secretKey = $secretKey;
        $this->merchantExId = $merchantExId;
        $this->storeExId = $storeExId;
    }

    public function setIsDebugRequest(bool $isDebug)
    {
        $this->isDebug = $isDebug;
    }

    public function setIsSandbox(bool $isSandbox)
    {
        $this->isSandbox = $isSandbox;
    }

    public function getHeaderClientIdName(): string
    {
        return 'X-Airpay-ClientId';
    }

    public function getHeaderSignature(): string
    {
        return 'X-Airpay-Req-H';
    }

    public function generateSignature($data): string
    {
        return base64_encode(hash_hmac('sha256', $data, $this->secretKey, true));
    }

    public function getBaseEndpoint ($path = '/'): string
    {
        if ($this->isSandbox) {
            return 'https://api.uat.wallet.airpay.co.th'.$path;
        }
        return 'https://api.wallet.airpay.co.th'.$path;
    }

    /**
     * @param $endpoint
     * @param $params
     * @param array $headers
     * @return bool|string
     * @throws RequestException|RuntimeException
     */
    protected function request($endpoint, $params, $headers = [])
    {
        $curl = curl_init($endpoint);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($this->isDebug) {
            curl_setopt($curl, CURLOPT_VERBOSE, true);
        }
        $response = curl_exec($curl);
        $httpStatusCode = intval(curl_getinfo($curl, CURLINFO_HTTP_CODE));
        $errNo = curl_errno($curl);
        $errMsg = curl_error($curl);
        curl_close($curl);
        if ($errNo > 0) {
            throw new RuntimeException($errMsg, $errNo);
        }
        if ($httpStatusCode > 399) {
            throw new RequestException($response, $httpStatusCode);
        }
        return $response;
    }

    protected function getHeaders($clientId, $signature): array
    {
        $headerClientId = $this->getHeaderClientIdName();
        $headerSignature = $this->getHeaderSignature();
        return [
            "$headerClientId:$clientId",
            "$headerSignature:$signature",
            'Content-Type:application/json'
        ];
    }
}
