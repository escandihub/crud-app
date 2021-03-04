<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Gupshup\SendController;
use App\Http\Controllers\Gupshup\WebhookController;
use App\Http\Controllers\Gupshup\MenssagesHandler\SenderFactoryController;

Route::prefix("bot")->group(function () {
	Route::get("send", [SendController::class, "send"]);
	Route::post("webhook", [WebhookController::class, "webhook"]);
	Route::get("req-opt", [WebhookController::class, "webhook"]);

	Route::get("send-img", [SenderFactoryController::class, "sendImagen"]);
	Route::get("send-audio", [SenderFactoryController::class, "sendAudio"]);
	Route::get("send-video", [SenderFactoryController::class, "sendVideo"]);
	Route::get("send-location", [SenderFactoryController::class, "sendLocation"]);
	Route::get("send-stiker", [SenderFactoryController::class, "sendStiker"]);
});
