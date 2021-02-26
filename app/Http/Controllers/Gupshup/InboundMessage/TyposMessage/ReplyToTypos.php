<?php
namespace App\Http\Controllers\Gupshup\InboundMessage\TyposMessage;
use App\Http\Controllers\Gupshup\MenssagesHandler\SendTypes;

class ReplyToTypos
{
	public $reply;
	public function __construct()
	{
		$this->reply = new SendTypes();
	}
	public function imagen()
	{
		$this->reply->send_imagen();
	}
	public function audio()
	{
		$this->reply->send_audio();
	}

	public function video()
	{
		$this->reply->send_video();
	}
	public function location()
	{
		$this->reply->send_location();
	}
	public function stiker()
	{
		$this->reply->send_stiker();
	}
}
