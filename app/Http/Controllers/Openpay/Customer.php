<?php

namespace App\Http\Controllers\Openpay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Customer extends Controller
{
	public $openpay;
	public function __construct(Type $var = null)
	{
		$OpenpayInstance = new OpenpayHelper();
		$this->openpay = $OpenpayInstance->getInstance();
	}
	public function createCustomer()
	{
		$customerData = [
			"external_id" => "q2",
			"name" => "customer name",
			"last_name" => "",
			"email" => "feliz@hacker.com",
			"requires_account" => false,
			"phone_number" => "44209087654",
			"address" => [
				"line1" => "Calle 10",
				"line2" => "col. san pablo",
				"line3" => "entre la calle 1 y la 2",
				"state" => "Chiapas",
				"city" => "Tuxtla",
				"postal_code" => "29030",
				"country_code" => "MX",
			],
		];

		$customer = $this->openpay->customers->add($customerData);
	}

	public function customerList()
	{
		return $this->openpay->customers->getList(findDataRequest);
	}

	public function customerAccount()
	{
		$bankDataRequest = [
			"clabe" => "072910007380090615",
			"alias" => "Cuenta principal",
			"holder_name" => "Teofilo Velazco",
		];

		$customer = $this->openpay->customers->get("arapqpl8qf4qsqq2eyda");
		$bankaccount = $customer->bankaccounts->add($bankDataRequest);
	}
}
