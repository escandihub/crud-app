<?php 

namespace App\Http\Controllers\Gupshup\MenssagesHandler;
use App\Http\Controllers\Gupshup\BotConnection;
class SendTypes {

	public function send_imagen()
	{
		// dd(BotConnection::sendTo("5219612954393"));
	   return BotConnection::sendToReusable('5219612954393',[
			"type" => "image",
			"originalUrl" => "https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg",
			"previewUrl" => "https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg",
			"caption" => "Sample image"
		]);
	}

	public function send_audio()
	{
		return BotConnection::sendToReusable('5219612954393', [
			"type" => "audio",
      "url" => "https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3"
		]);
	}
	public function send_video()
	{
		return BotConnection::sendToReusable('5219612954393', [
			"type" => "video",
      "url" => "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4",
			"caption" => "Sample Video"
		]);
	}

	public function send_location()
	{
		 $location = BotConnection::sendToReusable('5219612954393', [
			"type" => "location",
      "longitude" => 43.43,
			"latitude" => 33.34,
			"name" => "Nacional de Agua",
			"address" => "Los Laguitos INFONAVIT, Tuxtla Gutiérrez, Chis."
		]);
		\Log::alert($location);
		return $location;
	}

	public function send_stiker()
	{
		$stiker = BotConnection::sendToReusable('5219612954393', [
			"type" => "sticker",
			"url" => "https://s3.getstickerpack.com/storage/uploads/sticker-pack/molang/sticker_2.png?4caa5df6a45bbb11f66286f56deaa69f"
		]);

		\Log::alert($stiker);
		return $stiker;
	}
}