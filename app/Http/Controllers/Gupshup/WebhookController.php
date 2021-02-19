<?php

namespace App\Http\Controllers\Gupshup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Gupshup\MenssagesHandler\RawMessage;

class WebhookController extends Controller
{
    public function webhook(Request $request)
    {
        $hander = new RawMessage($request->all());
        $hander->playground();
    }
}
