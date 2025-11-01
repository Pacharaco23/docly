<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectMessage;
    public $bodyMessage;
    public $user;

    public function __construct($subjectMessage, $bodyMessage, $user)
    {
        $this->subjectMessage = $subjectMessage;
        $this->bodyMessage = $bodyMessage;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Soporte: ' . $this->subjectMessage,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.support-ticket', // Aquí va nuestra vista HTML
        );
    }

    public function build()
    {
        return $this->replyTo($this->user->email, $this->user->name);
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
