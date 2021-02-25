<?php
namespace App\Http\Controllers\Gupshup\InboundMessage;

use App\Http\Controllers\Gupshup\InboundMessage\Message;
use App\Http\Controllers\Gupshup\InboundMessage\MessageEvent;
use App\Http\Controllers\Gupshup\InboundMessage\UserEvent;

class InboundMessageFactory
{
	public function initializableMessage($type)
	{
		if ($type === "user-event") {
			return new UserEvent();
		} elseif ($type === "message-event") {
			return new MessageEvent();
		} elseif ($type === "message") {
			return new Message();
		}
	}
}
