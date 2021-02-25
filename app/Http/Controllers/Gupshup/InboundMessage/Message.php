<?php
namespace App\Http\Controllers\Gupshup\InboundMessage;
use App\Http\Controllers\Gupshup\InboundMessage\iMessages;

class Message implements iMessages
{
	public function process($message)
	{
		echo 'controlar la respuesta del mensaje';
	}
}
