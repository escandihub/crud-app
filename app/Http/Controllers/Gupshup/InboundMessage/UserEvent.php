<?php
namespace App\Http\Controllers\Gupshup\InboundMessage;
use App\Http\Controllers\Gupshup\InboundMessage\iMessages;

class UserEvent implements iMessages
{
	public function process($message)
	{
		echo 'salvar o actualizar la informacion';
	}
}
