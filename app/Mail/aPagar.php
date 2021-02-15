<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class aPagar extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario = 'Ramirez')
    {
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from("no-reply@fodap.ittg.edu.mx")
		->subject('Su pago')
			->view("mails.aPagar")
			// ->text("mails.observacion_plain")
			->with([
				//arreglo asociativo
			]);
    }
}
