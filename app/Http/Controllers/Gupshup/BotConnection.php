<?php
namespace App\Http\Controllers\Gupshup;
use Illuminate\Support\Facades\Http;

final class BotConnection
{
	const API = "https://api.gupshup.io/sm/api/v1/msg";
	private static $client = null;

	public static function sendTo($number)
	{
		return Http::withHeaders([
			"Cache-Control" => "no-cache",
			"apikey" => env("GUPSHUP_API_KEY"),
		])
			->asForm()
			->post(self::API, [
				"channel" => "whatsapp",
				"source" => env("BOT_NUMBER"),
				"destination" => "52" . $number,
				"message" => "¿te gusta?",
				"src.name" => env("BOT_NAME"),
			]);
	}
}
