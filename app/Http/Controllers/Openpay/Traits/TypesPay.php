<?php
namespace App\Http\Controllers\Openpay\Traits;

trait TypesPay
{
	public function typePay(string $method)
	{
		switch ($method) {
			case "bank_account":
				return [
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
				break;
			case "alipay":
				return [
					"method" => "alipay",
					"amount" => 100,
					"description" => "Cargo Alipay",
					"order_id" => "oid-00" . rand(1, 40),
					"redirect_url" => "http://www.example.com/myRedirectUrl",
				];
				break;
			default:
				return "metodo no soportado";
				break;
		}
	}
}
