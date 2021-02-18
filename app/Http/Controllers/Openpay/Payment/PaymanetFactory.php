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
	
//better option to use when call a function 
	private function mapToClass($type)
	{
		$classes = [
			'CardPayment' => 'card',
			'StorePayment' => 'store',
		];
		
		$callback = array_search($type, $classes);
		return call_user_func($callback);
	}
}
