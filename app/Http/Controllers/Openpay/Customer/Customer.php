<?php

namespace App\Http\Controllers\Openpay\Customer;
use App\Http\Controllers\Openpay\OpenpayHelper;
use App\Models\User;

class Customer extends OpenpayHelper
{
	public function create($customer)
	{
		$user = User::factory(1)->create()->first();
		parent::$openPay->customers->add(
			$this->testCustomer() + [
				"external_id" => $user->id,
			]
		);
	}

	public function testCustomer()
	{
		return [
			// "external_id" => "id132",
			"name" => "piloto",
			"last_name" => "",
			"email" => "customer_email@me.com",
			"requires_account" => false,
			"phone_number" => "44209087654",
			"address" => [
				"line1" => "Calle 10",
				"line2" => "col. san pablo",
				"line3" => "entre la calle 1 y la 2",
				"state" => "Queretaro",
				"city" => "Queretaro",
				"postal_code" => "76000",
				"country_code" => "MX",
			],
		];
	}
}
