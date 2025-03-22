<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestItemStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengirim;
    public $judul;
    public $status;

    public function __construct($pengirim, $judul, $status)
    {
        $this->pengirim = $pengirim;
        $this->judul = $judul;
        $this->status = $status;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Status Permintaan Anda',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.request_item_status',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
