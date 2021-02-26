<?php
namespace App\Http\Controllers\Gupshup;
use Illuminate\Support\Facades\Http;

final class BotConnection
{
	const API = "https://api.gupshup.io/sm/api/v1/msg";
	const API_OPT_IN = "https://api.gupshup.io/sm/api/v1/app/opt/in/";
	const API_USERS = "https://api.gupshup.io/sm/api/v1/users/";
	private static $client = null;

	public static function sendTo($number)
	{
		return Http::withHeaders([
			"apikey" => env("GUPSHUP_API_KEY"),
		])
			->asForm()
			->post(self::API, [
				"channel" => "whatsapp",
				"source" => env("BOT_NUMBER"),
				"destination" => $number,
				"message" => "¿te gusta?",
				"src.name" => env("BOT_NAME"),
			]);
	}
	public static function sendToReusable($number, $message)
	{
		return Http::withHeaders([
			"apikey" => env("GUPSHUP_API_KEY"),
			// "Content-Type" => "application/x-www-form-urlencoded"
		])
			->asForm()
			->post(self::API, [
				"channel" => "whatsapp",
				"source" => env("BOT_NUMBER"),
				"destination" => $number,
				"src.name" => env("BOT_NAME"),
				"message" => json_encode($message, true),
			]);
	}


/**
 * esto permite activar las notificaciones al 
 * usuario, ¿como se le permitiria desactivarlo?
 *
 * @param integer $number
 * @return Illuminate\Http\Client\Response
 */
	public static function requestOptIn($number)
	{
		return Http::withHeaders([
			"apikey" => env("GUPSHUP_API_KEY"),
		])
			->asForm()
			->post(self::API_OPT_IN . env("BOT_NAME"), [
				"user" => $number,
			]);
	}

	public static function getUsers()
	{
		return Http::withHeaders([
			"apikey" => env("GUPSHUP_API_KEY"),
		])->get(self::API_USERS . env("BOT_NAME"));
	}
}