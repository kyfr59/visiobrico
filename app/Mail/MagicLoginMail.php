<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MagicLoginMail extends Mailable
{
    public function __construct(public string $token) {}

    public function build()
    {
        return $this
            ->subject('Connexion sécurisée')
            ->view('emails.magic-login')
            ->with([
                'url' => route('connexion.connect', $this->token),
            ]);
    }
}