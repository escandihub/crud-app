<?php

namespace App\Http\Controllers\Openpay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Openpay\OpenpayHelper;

class PayoutController extends Controller
{
	public $openPay;
	public function __construct(Type $var = null)
	{
		$this->openPay  = new OpenpayHelper();
	}

	public function payCharge()
	{
		$payoutRequest = [
			"method" => "card",
			"destination_id" => "trxqoxhjsn39yz4f5wws",
			"amount" => 10,
			"description" => "compra de venta",
		];

		//cuenta bancaria
		$payoutRequest = [
			"method" => "bank_account",
			"bank_account" => [
				"clabe" => "000000000000000000",
				"holder_name" => "Mi empresa",
			],
			"amount" => 100.0,
			"description" => "Retiro de saldo semanal",
			"order_id" => "ORDEN-00021",
		];
		$customer = $this->openPay->customers->get("arapqpl8qf4qsqq2eyda");
		$payout = $customer->payouts->create($payoutRequest);
		// $payout = $this->openPay->payouts->create($payoutRequest);
		dd($payout);

		// $payout = $this->openPay->payouts->create($payoutRequest);

		// dd($payout);
	}

	public function redirec()
	{
		$customer = [
			"name" => "Mario",
			"last_name" => "Benedetti Farrugia",
			"phone_number" => "66666666",
			"email" => "xcandi@miempresa.mx",
		];

		//return an object 
		$chargeRequest = [
			"method" => "card",
			"amount" => 111,
			"description" => "Cargo prueba",
			"customer" => $customer,
			"send_email" => false,
			"confirm" => false,
			"redirect_url" => "http://www.openpay.mx/index.html",
		];
		
		$open = $this->openPay::getInstance()->charges->create($chargeRequest);
		return redirect($open->payment_method->url);
	}
}
