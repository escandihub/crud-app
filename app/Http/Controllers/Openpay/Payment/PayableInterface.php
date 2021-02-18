<?php

namespace App\Http\Controllers\Openpay\Payment;

interface PayableInterface
{
    public function pay();
}