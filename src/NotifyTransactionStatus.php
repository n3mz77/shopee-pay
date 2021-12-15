<?php

namespace Persec\ShopeePay;

class NotifyTransactionStatus
{
    public $amount;
    public $transaction_sn;
    public $method;
    public $user_id_hash;
    public $merchant_ext_id;
    public $store_ext_id;
    public $terminal_id;
    public $co_funding;
    public $reference_id;
    public $transaction_type;
    public $transaction_status;

    public function __construct(array $data)
    {
        $this->amount = $data['amount'] ?? null;
        $this->transaction_sn = $data['transaction_sn'] ?? null;
        $this->method = $data['method'] ?? null;
        $this->user_id_hash = $data['user_id_hash'] ?? null;
        $this->merchant_ext_id = $data['merchant_ext_id'] ?? null;
        $this->store_ext_id = $data['store_ext_id'] ?? null;
        $this->terminal_id = $data['terminal_id'] ?? null;
        $this->co_funding = $data['co_funding'] ?? null;
        $this->reference_id = $data['reference_id'] ?? null;
        $this->transaction_type = $data['transaction_type'] ?? null;
        $this->transaction_status = $data['transaction_status'] ?? null;
    }
}
