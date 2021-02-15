<?php

namespace App\Http\Controllers\Openpay;

use App\Http\Controllers\Controller;
use Openpay;

class OpenpayHelper extends Controller
{
	public $openpay;
	public function __construct()
	{
		/**
		 *  CLIENT ID, PRIVATE KEY , COUNTRY CODE
		 */
		$this->openPay = Openpay::getInstance(
			env("OPENPAY_MERCHANT_ID"),
			env("OPENPAY_PRIVATE_KEY"),
			env("OPENPAY_COUNTRY_CODE")
		);

		Openpay::setProductionMode(false);
	}

	public function getInstance()
	{
		return $this->openPay;
	}
}
