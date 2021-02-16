<?php

namespace App\Http\Controllers\Gupshup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Connection extends Controller
{
	private $api;
	private $endpoint = "https://api.gupshup.io/sm/api/v1/msg";
	public function __construct()
	{
	}

	public function authentication()
	{
		return $this->api = Http::withHeaders($this->headers())
			->asForm()
			->post($this->endpoint, [
				"channel" => "whatsapp",
				"source" => "917834811114",
				"destination" => "5219612954393",
				"message" => "hola",
				"src.name" => env("BOT_NAME"),
			]);
	}

	private function headers(): array
	{
		return [
			"Cache-Control" => "no-cache",
			// "Content-Type" => "application/x-www-form-urlencoded",
			"apikey" => env("GUPSHUP_API_KEY"),
		];
	}

	/**
	 * form URL encode
	 *
	 * @return void
	 */
	private function form(): array
	{
		return [
			"channel" => "whatsapp",
			"source" => "917834811114",
			"destination" => "19612954393",
			"message" => "hola",
			"src.name" => env("BOT_NAME"),
		];
	}
}
