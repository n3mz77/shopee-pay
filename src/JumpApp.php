<?php

namespace Persec\ShopeePay;

use Persec\ShopeePay\Exceptions\RuntimeException;

class JumpApp extends ShopeePay
{

    protected function getEndpoint(): string
    {
        return $this->getBaseEndpoint('/v3/merchant-host/order/create');
    }

    /**
     * @param JumpAppRequest $requestParams
     * @return JumpAppResponse|null
     * @throws Exceptions\RequestException
     * @throws Exceptions\RuntimeException
     */
    public function create(JumpAppRequest $requestParams): ?JumpAppResponse
    {
        $endpoint = $this->getEndpoint();
        $params = (array) $requestParams;
        $strParams = json_encode($params);
        $signature = $this->generateSignature($strParams);
        $headers = $this->getHeaders($this->clientId, $signature);
        $strResponse =  $this->request($endpoint, $strParams, $headers);
        $decoded = json_decode($strResponse, true);
        if (!empty($decoded['errcode'])) {
            $msg = $decoded['debug_msg'] ?? $decoded['errcode'];
            throw new RuntimeException("response got error message $msg");
        }
        return new JumpAppResponse($decoded);
    }
}
