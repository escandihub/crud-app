<?php

namespace App\Http\Controllers\Openpay\Payment;


class CardPayment implements PayableInterface
{
    public function pay()
    {
        echo 'some pay with card';
    }
}
