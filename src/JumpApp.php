<?php

namespace Persec\ShopeePay;

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
        $res =  $this->request($endpoint, $strParams, $headers);
        return new JumpAppResponse(json_decode($res, true));
    }
}
