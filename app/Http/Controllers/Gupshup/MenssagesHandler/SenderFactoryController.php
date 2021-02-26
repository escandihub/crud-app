<?php

namespace App\Http\Controllers\Gupshup\MenssagesHandler;

use App\Http\Controllers\Gupshup\MenssagesHandler\SendTypes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SenderFactoryController extends Controller
{

	public $sender;
	public function __construct() {
		$this->sender = new SendTypes();
	}

	public function sendImagen()
	{
		dd($this->sender->send_imagen());
	}
	public function sendAudio()
	{
		dd($this->sender->send_audio());
	}

	public function sendVideo()
	{
		dd($this->sender->send_video());
	}
	public function sendLocation()
	{
		dd($this->sender->send_location());
	}
	public function sendStiker()
	{
		dd($this->sender->send_stiker());
	}
}
