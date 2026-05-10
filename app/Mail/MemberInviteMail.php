<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MemberInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $password;
    public $role;
    public $inviterName;

    public function __construct($name, $email, $password, $role, $inviterName)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->inviterName = $inviterName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address(config('mail.from.address'), $this->inviterName . ' via URL Shortener'),
            subject: ucfirst($this->role) . ' Invitation - URL Shortener',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.member_invite',
        );
    }
}
