<?php

namespace Persec\ShopeePay;

class NotifyTransactionResponse
{
    public $errcode;
    public $debug_msg;

    public function __construct($errcode, $debugMsg)
    {
        $this->errcode = $errcode;
        $this->debug_msg = $debugMsg;
    }
}
