<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $password;
    public $inviterName;

    public function __construct($name, $email, $password, $inviterName)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->inviterName = $inviterName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address(config('mail.from.address'), $this->inviterName . ' via URL Shortener'),
            subject: 'Admin Invitation - URL Shortener',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_invite',
        );
    }
}
