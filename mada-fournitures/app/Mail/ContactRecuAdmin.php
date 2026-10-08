<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactRecuAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Contact $contact)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🔔 Nouveau message : ' . $this->contact->sujet,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.admin',
            with: [
                'contact' => $this->contact,
                'urlAdmin' => route('admin.messages'),
            ],
        );
    }
}