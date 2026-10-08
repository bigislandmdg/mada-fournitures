<?php

namespace App\Mail;

use App\Models\Devis;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DevisRecuClient extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Devis $devis)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre demande de devis ' . $this->devis->reference,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.devis.client',
            with: [
                'devis' => $this->devis,
            ],
        );
    }
}