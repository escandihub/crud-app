<?php

namespace App\Http\Controllers\Openpay\Payment;

class StorePayment implements PayableInterface
{
    public function pay()
    {
        echo 'some pay with stores';
    }
}
