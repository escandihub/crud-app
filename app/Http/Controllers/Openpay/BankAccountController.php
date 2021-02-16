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
		$this->openPay = new OpenpayHelper();
	}

	/**
	 * make a bank-account
	 *
	 * @return void
	 */
	public function createBackAccount(
		string $clabe = "072910007380090615",
		string $alias = "principal",
		string $hold_name = "Maria cruz"
	) {
		$datos_banco = [
			"clabe" => $clabe,
			"alias" => $alias,
			"holder_name" => $hold_name,
		];
		return $this->openPay::getInstance()->customers->get("a9ualumwnrcxkl42l6mh");
	}

	public function getBankAccount(string $customer_id, string $backaccount_id)
	{
		$customer = $openpay::getInstance()->customers->get($customer_id);
		$bankaccount = $customer->bankaccounts->get($backaccount_id);
		return $bankaccount;
	}

	public function createCard()
	{
		$cardDataRequest = [
			"token_id" => $this->openPay::getInstance()->generateToken(),
			"device_session_id" => "8VIoXj0hN5dswYHQ9X1mVCiB72M7FY9o",
		];
		$customer = $this->openPay::getInstance()->customers->get("arapqpl8qf4qsqq2eyda");
		$card = $customer->cards->add($cardDataRequest);
	}
}
