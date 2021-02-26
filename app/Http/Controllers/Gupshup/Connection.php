<?php

namespace App\Http\Controllers\Gupshup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Connection extends Controller
{
	//test val temp

	private $number = "19612954393";
	private $message;
	//adove is jut for test
	private $api;
	private $endpoint = "https://api.gupshup.io/sm/api/v1/msg";
	public function __construct()
	{
	}

	public function authentication()
	{
		return Http::withHeaders($this->headers())
			->asForm()
			->post($this->endpoint, $this->form());
	}

	private function headers(): array
	{
		return [
			"Cache-Control" => "no-cache",
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
			"source" => env('BOT_NUMBER'),
			"destination" => "5219612954393",
			"message" => "¿te gusta?",
			"src.name" => env("BOT_NAME"),
		];
	}
	public function replyTo($destination, $message)
	{
		$this->number = $destination;
		$this->message = $message;
		$this->authentication();
	}
}
