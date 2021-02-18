<?php

namespace App\Http\Controllers\Openpay\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Openpay\Payment\PaymanetFactory;

class PayController extends Controller
{
	public function store(Request $request)
	{
		$paymanet = new PaymanetFactory();
		$payOption = $paymanet->initializablePayment($request->type);
		$payOption->pay();
	}
}
