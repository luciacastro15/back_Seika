<?php

namespace App\Mail;

use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserRegisterMail extends Mailable
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
        return $this->subject('Nuevo registro de usuario')
                    ->markdown('emails.new_user_register');
                    
    }
}
