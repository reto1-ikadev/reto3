<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevoUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public  $datos;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        //
        $this->datos = $datos;
    }

    public function  build(){
        return $this->view('email.nuevousuario')->subject('Nuevo Usuario')->with('datos', $this->datos);
    }
}
