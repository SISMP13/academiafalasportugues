<?php

namespace Bittacora\Pages\Http\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PreOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public mixed $params;

    /**
     * Create a new message instance.
     */
    public function __construct($params)
    {
        $this->params=$params;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Un usuario quiere hacer una pre-orden de pedido',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pages::mail.pre-order',
        );
    }
}
