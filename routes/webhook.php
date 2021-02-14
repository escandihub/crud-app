<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SendWebhookController;

Route::prefix("webhook")->group(function () {
	// route to invoque the webhook
	Route::get("send-webhook", [SendWebhookController::class, "send"])->name(
		"send-webhook"
	);
});
