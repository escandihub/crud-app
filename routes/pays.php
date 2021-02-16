<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneratePayController;
use App\Http\Controllers\Openpay\Customer;
use App\Http\Controllers\Openpay\BankAccountController;
use App\Http\Controllers\Openpay\PayoutController;
use App\Http\Controllers\Openpay\ChargeTokenController;

Route::group(['prefix' => 'pays'], function () {
	Route::any("link-generator", [GeneratePayController::class, "basicPay"]);
	Route::get("cargos", [GeneratePayController::class, "getCharges"]);
	Route::get("pagar", [GeneratePayController::class, "payCharge"]);

	//create an client
	Route::get("makeCustomer", [Customer::class, "createCustomer"]);
	Route::get("cuenta-cliente", [Customer::class, "customerAccount"]);
	//account administration
	Route::get("card", [BankAccountController::class, "createCard"]);
	//cargo sin formulario en sitio
	Route::get("redirect", [PayoutController::class, "redirec"]);
	//cargo con formulario personalizado
	Route::post("cargo-token", [ChargeTokenController::class, "store"])->middleware();
});
