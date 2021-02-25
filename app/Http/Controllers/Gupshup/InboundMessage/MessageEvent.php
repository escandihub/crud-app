<?php
namespace App\Http\Controllers\Gupshup\InboundMessage;
use App\Http\Controllers\Gupshup\InboundMessage\iMessages;

class MessageEvent implements iMessages
{
	public function process($message)
	{
		\Log::info('salvar si el mesanje se guardo');
		echo 'conocer el estado del mensaje, es visto o no';
	}
}
