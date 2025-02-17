<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $adjunto;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $adjunto = null)
    {
        $this->name = $name;
        $this->adjunto = $adjunto;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Asunto del mensaje',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.prueba', //Vista para el mensaje
            with: ['name' => $this->name],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $adjuntos = [
            //Attachment::fromStorage('rutaDelAdjunto/adjunto.pdf') //todos los mensajes enviados con esta plantilla llevarían este adjunto
        ];

        if ($this->adjunto) {
            $adjuntos[] = Attachment::fromStorage('rutaDelAdjunto/adjunto.pdf');
        }

        return $adjuntos;
    }
}
