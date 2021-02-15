<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneratePayController;
use App\Http\Controllers\Openpay\Customer;
use App\Http\Controllers\Openpay\BankAccountController;

Route::prefix("pays")->group(function () {
	Route::any("link-generator", [GeneratePayController::class, "basicPay"]);
	Route::get("cargos", [GeneratePayController::class, "getCharges"]);
	Route::get("pagar", [GeneratePayController::class, "payCharge"]);

	//create an client
	Route::get("makeCustomer", [Customer::class, "createCustomer"]);
	Route::get("cuenta-cliente", [Customer::class, "customerAccount"]);
	//account administration
	Route::get("card", [BankAccountController::class, "createCard"]);
});
