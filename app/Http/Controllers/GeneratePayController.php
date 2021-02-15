<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//helper class
use App\Http\Controllers\Openpay\OpenpayHelper;

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
			"method" => "card",
			"amount" => 210,
			"description" => "Cargo desde terminal virtual de 210",
			"currency" => "MXN",
			// "device_session_id" => "kR1MiQhz2otdIuUlQkbEyitImMiI16f",
			// "order_id" => "oid-00052",
			"customer" => $empleado,
			"send_email" => false,
			"confirm" => false,
			"redirect_url" => "http://www.openpay.mx/index.html",
		];

		$cargo = $this->openPay->charges->create($solicitudGargo);
		dd($cargo);
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
}
