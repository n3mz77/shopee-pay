<?php

namespace Persec\ShopeePay\Exceptions;

use Exception;

class RuntimeException extends Exception
{
    private $httpsStatus;
    public function __construct(string $msg, $code = 0, $prev = null)
    {
        $previous = $this->getPrevious();
        $code = $this->code;
        $this->message = $msg;
        parent::__construct($msg, $code, $previous);
    }
}
