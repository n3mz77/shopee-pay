<?php

namespace Persec\ShopeePay;

class JumpAppRequest
{
    public $request_id;
    public $payment_reference_id;
    public $merchant_ext_id;
    public $store_ext_id;
    public $amount;
    public $currency;
    public $return_url;
    public $platform_type;
    public $validity_period;
    public $expiry_time;
    public $promo_ids;
    public $additional_info;

    public function __construct(array $data)
    {
        $this->request_id = $data['request_id'] ?? null;
        $this->amount = $data['amount'] ?? null;
        $this->currency = $data['currency'] ?? null;
        $this->merchant_ext_id = $data['merchant_ext_id'] ?? null;
        $this->store_ext_id = $data['store_ext_id'] ?? null;
        $this->payment_reference_id = $data['payment_reference_id'] ?? null;
        $this->promo_ids = $data['promo_ids'] ?? null;
        $this->additional_info = $data['additional_info'] ?? null;
        $this->return_url = $data['return_url'] ?? null;
        $this->platform_type = $data['platform_type'] ?? null;
        $this->validity_period = $data['validity_period'] ?? null;
        $this->expiry_time = $data['expiry_time'] ?? null;
    }
}
