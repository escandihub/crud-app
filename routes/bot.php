<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Gupshup\SendController;
use App\Http\Controllers\Gupshup\WebhookController;

Route::prefix("bot")->group(function () {
	Route::get("send", [SendController::class, "send"]);
	Route::get("webhook", [WebhookController::class, "webhook"]);

});
