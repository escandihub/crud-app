<?php
namespace App\Http\Controllers\Gupshup\InboundMessage;
use App\Http\Controllers\Gupshup\InboundMessage\iMessages;

class Message implements iMessages
{
	public function process($message)
	{
		echo 'controlar la respuesta del mensaje, mi total *$20*, a _pagar_ ~better~ best, ```hello word```';
	}

	public function expectedType(string $type): bool
	{
		if(!in_array($type, ['text', 'file', 'photo']))
		return 'Este dato no se esta esperando, verifique su respuesta';
	}
}
