<?php

namespace App\Http\Controllers\Gupshup\MenssagesHandler;

use Illuminate\Support\Collection;
use App\Http\Controllers\Gupshup\Connection;
class RawMessage
{
	private $message;
	public function __construct($message = [])
	{
		$this->message = $message;
	}
	public function playground()
	{
		\Log::info($this->message);
		$col = collect($this->message);

		    $dial = $col['payload']['sender']['dial_code'];
		    // \Log::info(gettype($dial));
		    $msg = new Connection();
		    $msg->replyTo($dial, 'hola perdido');
	}
}
