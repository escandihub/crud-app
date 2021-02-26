<?php
namespace App\Http\Controllers\Gupshup\InboundMessage;
use App\Http\Controllers\Gupshup\InboundMessage\iMessages;
use App\Http\Controllers\Gupshup\InboundMessage\TyposMessage\ReplyToTypos;
class Message implements iMessages
{
	public function process($message)
	{
		// echo 'controlar la respuesta del mensaje, mi total *$20*, a _pagar_ ~better~ best, ```hello word```';
		// \Log::alert($message);
		$msg = $message["payload"]["payload"]["text"];

		if (in_array($msg, ["imagen", "video", "audio"])) {
			$typos = new ReplyToTypos();
			call_user_func([$typos, $msg]);
		}
		echo "no contamos con ese comando";
	}

	public function expectedType(string $type): bool
	{
		if (!in_array($type, ["text", "file", "photo"])) {
			return "Este dato no se esta esperando, verifique su respuesta";
		}
	}
}
