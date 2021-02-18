<?php

namespace App\Http\Controllers\Openpay\Payment;

use App\Http\Controllers\Openpay\Payment\CardPayment;
use App\Http\Controllers\Openpay\Payment\StorePayment;

class PaymanetFactory
{
	public function initializablePayment($type)
	{
		if ($type === "card") {
			return new CardPayment();
		} elseif ($type === "store") {
			return new StorePayment();
		}
	}
}
