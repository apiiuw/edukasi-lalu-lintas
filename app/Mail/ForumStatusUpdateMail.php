<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForumStatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $forum;

    public function __construct($forum)
    {
        $this->forum = $forum;
    }

    public function build()
    {
        return $this->markdown('emails.forum_status_update')
                    ->subject('Status Pertanyaan Forum Diskusi Anda Telah Diperbarui')
                    ->with([
                        'pertanyaan' => $this->forum->pertanyaan,
                        'status' => $this->forum->status,
                        'pengirim' => $this->forum->pengirim,
                    ]);
    }
}
