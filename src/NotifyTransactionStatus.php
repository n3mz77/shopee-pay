<?php

namespace Persec\ShopeePay;

class NotifyTransactionStatus
{
    private const STATUS_PROCESSING = 2;
    private const STATUS_SUCCESS = 3;
    private const STATUS_FAILED = 4;

    private const TX_TYPE_PAYMENT = 13;
    private const TX_TYPE_REFUND = 15;
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
        $this->transaction_type = intval($data['transaction_type'] ?? 0);
        $this->transaction_status = intval($data['transaction_status'] ?? self::STATUS_PROCESSING);
    }

    public function isTransactionSuccess(): bool
    {
        return $this->transaction_status === self::STATUS_SUCCESS;
    }

    public function isTransactionFailed(): bool
    {
        return $this->transaction_status === self::STATUS_FAILED;
    }

    public function isTypePayment(): bool
    {
        return $this->transaction_type === self::TX_TYPE_PAYMENT;
    }
}
