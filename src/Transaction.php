<?php

namespace Persec\ShopeePay;

class Transaction
{
    public $reference_id;
    public $amount;
    public $transaction_sn;
    public $status;
    public $transaction_type;
    public $create_time;
    public $update_time;
    public $user_id_hash;
    public $merchant_ext_id;
    public $store_ext_id;
    public $terminal_id;
    public $promo_id_applied;

    public function __construct(array $data)
    {
        $this->reference_id = $data['reference_id'] ?? null;
        $this->amount = $data['amount'] ?? null;
        $this->transaction_sn = $data['transaction_sn'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->transaction_type = $data['transaction_type'] ?? null;
        $this->create_time = $data['create_time'] ?? null;
        $this->update_time = $data['update_time'] ?? null;
        $this->user_id_hash = $data['user_id_hash'] ?? null;
        $this->merchant_ext_id = $data['merchant_ext_id'] ?? null;
        $this->store_ext_id = $data['store_ext_id'] ?? null;
        $this->terminal_id = $data['terminal_id'] ?? null;
        $this->promo_id_applied = $data['promo_id_applied'] ?? null;
    }
}
