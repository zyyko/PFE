<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private string $content, private string $title)
    {
        //
    }
    public function build()
    {
        return $this->markdown('admin.mail.email')
                    ->subject('Welcome to our application')
                    ->with([
                        'title' => $this->title,
                        'content' => $this->content
                ]);
    }
}
