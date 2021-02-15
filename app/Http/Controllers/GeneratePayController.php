<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//helper class
use App\Http\Controllers\Openpay\OpenpayHelper;
use Openpay;

//mail acctions
use Illuminate\Support\Facades\Mail;
use App\Mail\aPagar;
// Mail::to('moreno@io.com')->send(new aPagar());
class GeneratePayController extends Controller
{
	public $openPay;
	public function __construct(Type $var = null)
	{
		$OpenpayInstance = new OpenpayHelper();
		$this->openPay = $OpenpayInstance->getInstance();
	}
	public function basicPay()
	{
		$empleado = [
			"name" => "Mario",
			"last_name" => "cruz xD",
			"phone_number" => "1111111111",
			"email" => "mario@treeshop.mx",
		];

		$solicitudGargo = [
			"method" => "bank_account",
			"amount" => 100,
			"description" => "Cargo con banco",
			"currency" => "MXN",
			// "device_session_id" => "kR1MiQhz2otdIuUlQkbEyitImMiI16f",
			// "order_id" => "oid-00052",
			// "customer" => $empleado,
			"send_email" => false,
			"confirm" => false,
			"redirect_url" => "127.0.0.1:8000",
		];

		//cliente
		$customer = $this->openPay->customers->get("arapqpl8qf4qsqq2eyda");
		$customer->charges->create($solicitudGargo);
		//comercio
		// $cargo = $this->openPay->charges->create($solicitudGargo);
		dd($customer);
		return response()->json([
			"data" => $cargo,
		]);
	}

	public function getCharges()
	{
		$cargos = $this->openPay->charges->get("trpcliyfgwmqextwr9ae");

		dd($cargos);
		return response()->json($cargo, 200);
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
}
