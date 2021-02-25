<?php

namespace App\Http\Controllers\Gupshup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Controllers\Gupshup\Connection;
use  App\Http\Controllers\Gupshup\BotConnection;
class SendController extends Controller
{
    public $conec;
    public function send()
    {
        // $conec = new Connection;
      // dd($conec->authentication());
      dd(BotConnection::sendTo("19612954393"));
      \Log::alert('todo bien');
    }
}
