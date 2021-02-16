<?php

namespace App\Http\Controllers\Gupshup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Controllers\Gupshup\Connection;
class SendController extends Controller
{
    public $conec;
    public function send()
    {
        $conec = new Connection;
      dd($conec->authentication());
    }
}
