<?php

namespace Persec\ShopeePay;

class TransactionStatusResponse
{
    public $request_id;
    public $errcode;
    public $debug_msg;
    public $payment_method;
    /**
     * @var Transaction
     */
    public $transaction;

    public function __construct(array $data)
    {
        $this->request_id = $data['request_id'] ?? null;
        $this->errcode = $data['errcode'] ?? null;
        $this->debug_msg = $data['debug_msg'] ?? null;
        $this->payment_method = $data['payment_method'] ?? null;
        if (!empty($data['transaction'])) {
            $this->transaction = new Transaction($data['transaction']);
        }
    }
}
