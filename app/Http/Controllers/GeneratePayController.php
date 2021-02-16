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

//traits
use App\Http\Controllers\Openpay\Traits\TypesPay;

class GeneratePayController extends Controller
{
	use TypesPay;

	public $openPay;
	public function __construct(Type $var = null)
	{
		$OpenpayInstance = new OpenpayHelper();
		$this->openPay = $OpenpayInstance::getInstance();
	}
	public function basicPay()
	{
		$empleado = [
			"name" => " Lucius",
			"last_name" => "Seneca",
			"phone_number" => "6669999555",
			"email" => "senecea@dieyoung.mx",
		];

		$solicitudCargo = $this->typePay("alipay");
		//cliente
		$customer = $this->openPay->customers->get("arapqpl8qf4qsqq2eyda");
		$customer->charges->create($solicitudCargo);
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

	
}
