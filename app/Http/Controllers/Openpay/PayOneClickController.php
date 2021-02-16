<?php

namespace App\Http\Controllers\Openpay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayOneClickController extends Controller
{
	public $openpay;
	public function __construct()
	{
		$OpenpayInstance = new OpenpayHelper();
		$this->openpay = $OpenpayInstance::getInstance();
	}

	public function store(Request $request)
	{
        //sin control de errores
		$cliente = [
			"name" => $request->name,
			"last_name" => $request->last_name,
			"email" => $request->email,
		];

		$solicitudCargo = [
			"method" => "card",
			"source_id" => $request->token,
			"amount" => "10",
			"currency" => "MXN",
			"description" => "Cargo a tu recibo telmex",
			"device_session_id" => $request->deviceSessionId,
			"customer" => $cliente,
		];
		$cargo = $this->openpay->carges->create($solicitudCargo);
		return response()->json(["data" => $cargo->id], 200);
	}
}
