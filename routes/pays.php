<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GeneratePayController;

Route::prefix("pays")->group(function () {
	Route::any("link-generator", [GeneratePayController::class, "basicPay"]);
});
