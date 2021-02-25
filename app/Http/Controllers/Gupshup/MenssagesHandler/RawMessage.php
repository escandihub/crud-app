<?php

namespace App\Http\Controllers\Gupshup\MenssagesHandler;

use Illuminate\Support\Collection;
use App\Http\Controllers\Gupshup\Connection;
use App\Http\Controllers\Gupshup\InboundMessage\InboundMessageFactory;
class RawMessage
{
	private $message;
	public function __construct($message = [])
	{
		$this->message = $message;
	}
	public function playground()
	{
		\Log::error($this->message['type']); //as array
		// $obj = json_decode($this->message, true);
		// \Log::info($obj->type);
		$mensajeEntrada = new InboundMessageFactory();
		$type = $mensajeEntrada->initializableMessage($this->message["type"]);
		$type->process($this->message);
		// $col = collect($this->message); // as collection
		// \Log::info($col->first());
		//     $dial = $col['payload']['sender']['dial_code'];
		//     // \Log::info(gettype($dial));
		//     $msg = new Connection();
		//     $msg->replyTo($dial, 'hola perdido');
	}
}
