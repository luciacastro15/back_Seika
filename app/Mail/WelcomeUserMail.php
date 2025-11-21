<?php

namespace App\Mail;

use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;
        public Usuario $usuario;
    /**
     * Create a new message instance.
     */
    public function __construct(Usuario $usuario)
    {
        //
        $this->usuario = $usuario;

    }

    public function build()
    {
        return $this->subject('Bienvenido a Seika Audit')
                    ->markdown('emails.welcome_user');
                    
    }


}
