<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginProvidersController;
use App\Http\Controllers\SendWebhookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
	return $request->user();
});

Route::post("login", [AuthController::class, "login"]);

Route::group(["middleware" => "auth:sanctum"], function () {
	Route::post("logout", [AuthController::class, "logout"]);
	Route::apiResource("personal", PersonalController::class);
});

/**
 * test to check out the pushnotification 
 */ 
Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});

//login 3er party
Route::get("login/{provider}", [LoginProvidersController::class, "redirectToProvider"]);
Route::get("login/{provider}/callback", [LoginProvidersController::class, "handleProviderCallback"]);

// route to invoque the webhook
Route::get('send-webhook', [SendWebhookController::class, 'send'])->name('send-webhook');