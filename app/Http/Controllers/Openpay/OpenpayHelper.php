<?php

namespace App\Http\Controllers\Openpay;

use Openpay;

class OpenpayHelper
{
	public static $openPay;
	public function __construct()
	{
		/**
		 *  CLIENT ID, PRIVATE KEY , COUNTRY CODE
		 */
		self::$openPay = Openpay::getInstance(
			env("OPENPAY_MERCHANT_ID"),
			env("OPENPAY_PRIVATE_KEY"),
			env("OPENPAY_COUNTRY_CODE")
		);

		Openpay::setProductionMode(false);
	}

	/**
	 * instance of Openpay
	 *
	 * @return Openpay Object
	 */
	public static function getInstance()
	{
		return self::$openPay;
	}
}
