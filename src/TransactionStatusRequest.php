<?php


namespace Persec\ShopeePay;


class TransactionStatusRequest
{
    public $request_id;
    public $reference_id;
    public $transaction_type;
    public $merchant_ext_id;
    public $store_ext_id;
    public $amount;

    public function __construct(array $data)
    {
        $this->request_id = $data['request_id'] ?? null;
        $this->reference_id = $data['reference_id'] ?? null;
        $this->transaction_type = $data['transaction_type'] ?? null;
        $this->merchant_ext_id = $data['merchant_ext_id'] ?? null;
        $this->store_ext_id = $data['store_ext_id'] ?? null;
        $this->amount = $data['amount'] ?? null;
    }

}
