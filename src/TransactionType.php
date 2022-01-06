<?php

namespace Persec\ShopeePay;

class TransactionType
{
    const PAYMENT = 13;
    const REFUND = 15;
    const ADJUSTMENT_ADD = 32;
    const ADJUSTMENT_DEDUCT = 33;
    const CASH_IN = 36;
    const CASH_OUT = 37;
}
