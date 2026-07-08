<?php

namespace App\Mail;

use Bittacora\CourseInscriptions\Models\CourseInscriptionModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseInscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public CourseInscriptionModel $inscription;

    /**
     * Create a new message instance.
     */
    public function __construct(CourseInscriptionModel $inscription)
    {
        $this->inscription = $inscription;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva inscripción a un curso',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.course-inscription',
        );
    }
}
