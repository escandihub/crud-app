<?php
namespace App\Http\Controllers\helpers;
use Openpay;
trait OpenpayHelper
{
	public $openpay;

	public function __construct()
	{
		$this->openPay = Openpay::getInstance(
			env("OPENPAY_MERCHANT_ID"),
			env("OPENPAY_PRIVATE_KEY"),
			env("OPENPAY_COUNTRY_CODE")
		);
		Openpay::setProductionMode(false);
	}
}
