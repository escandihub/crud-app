<?php

namespace App\Http\Controllers\Openpay;

use Openpay;

final class OpenpayHelper
{
	private static $openPay = null;

	public static function getInstance()
	{
		if (static::$openPay === null) {
			static::$openPay = new static();
		}
		return Openpay::getInstance(
			env("OPENPAY_MERCHANT_ID"),
			env("OPENPAY_PRIVATE_KEY"),
			env("OPENPAY_COUNTRY_CODE")
		);
	}
}
