<?php

namespace Persec\ShopeePay;

class JumpAppResponse
{
    public $request_id;
    public $errcode;
    public $debug_msg;
    public $store_name;
    public $redirect_url_app;
    public $redirect_url_http;

    public function __construct(array $data)
    {
        $this->request_id = $data['request_id'] ?? null;
        $this->errcode = $data['errcode'] ?? null;
        $this->debug_msg = $data['debug_msg'] ?? null;
        $this->store_name = $data['store_name'] ?? null;
        $this->redirect_url_app = $data['redirect_url_app'] ?? null;
        $this->redirect_url_http = $data['redirect_url_http'] ?? null;
    }

}
