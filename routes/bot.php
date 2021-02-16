<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Gupshup\SendController;

Route::prefix("bot")->group(function () {
	Route::get("send", [SendController::class, "send"]);
});
