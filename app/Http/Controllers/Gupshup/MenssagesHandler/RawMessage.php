<?php

namespace App\Http\Controllers\Gupshup\MenssagesHandler;

use Illuminate\Support\Collection;

class RawMessage
{
    private $message;
    public function __construct($message = []) {
        $this->message = $message;
    }
    public function playground()
    {
        \Log::alert($this->message);
    }
}
