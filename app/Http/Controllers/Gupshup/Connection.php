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
			->asForm() //x-www-form-urlencoded
			->post($this->endpoint, $this->form());
	}
	public function webhook()
	{
		Http::withHeaders($this->headers())->post($this->endpoint);
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
			"destination" => "19613237188",
			"message" => "hola",
			"src.name" => env("BOT_NAME"),
		];
	}
}
