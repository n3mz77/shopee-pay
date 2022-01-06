<?php


namespace Persec\ShopeePay;


use Persec\ShopeePay\Exceptions\RuntimeException;

class TransactionStatus extends ShopeePay
{
    protected function getEndpoint(): string
    {
        return $this->getBaseEndpoint('/v3/merchant-host/transaction/check');
    }

    /**
     * @param TransactionStatusRequest $request
     * @return TransactionStatusResponse
     * @throws Exceptions\RequestException
     * @throws RuntimeException
     */
    public function check(TransactionStatusRequest $request): TransactionStatusResponse
    {
        $endpoint = $this->getEndpoint();
        $params = (array) $request;
        $strParams = json_encode($params);
        $signature = $this->generateSignature($strParams);
        $headers = $this->getHeaders($this->clientId, $signature);
        $strResponse =  $this->request($endpoint, $strParams, $headers);
        $decoded = json_decode($strResponse, true);
        if (!empty($decoded['errcode'])) {
            $msg = $decoded['debug_msg'] ?? $decoded['errcode'];
            throw new RuntimeException("response got error message $msg");
        }
        return new TransactionStatusResponse($decoded);
    }
}
