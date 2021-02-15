<?php

namespace App\Http\Controllers\Openpay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Openpay\OpenpayHelper; //helper Openpay

class BankAccountController extends Controller
{
	public $openPay;
	public function __construct(Type $var = null)
	{
		$OpenpayInstance = new OpenpayHelper();
		$this->openPay = $OpenpayInstance->getInstance();
	}

	/**
	 * make a bank-account
	 *
	 * @return void
	 */
	public function createBackAccount(
		string $clabe = "072910007380090615",
		string $alias = "principal",
		string $hold_name = "Rodolfo lopez"
	) {
		$datos_banco = [
			"clabe" => $clabe,
			"alias" => $alias,
			"holder_name" => $hold_name,
		];
		return $this->openPay->customers->get("a9ualumwnrcxkl42l6mh");
	}

	public function getBankAccount(string $customer_id, string $backaccount_id)
	{
		$customer = $openpay->customers->get($customer_id);
		$bankaccount = $customer->bankaccounts->get($backaccount_id);
		return $bankaccount;
	}
}
