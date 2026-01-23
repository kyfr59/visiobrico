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
    public function __construct(
        public string $token,
        public string $type = 'login'
    ) {}

    public function build()
    {
        return match ($this->type) {
            'validate-demand'   => $this->buildValidateDemand(),
            default             => $this->buildConnectUser(),
        };
    }

    public function buildConnectUser()
    {
        return $this
            ->subject('Connexion sécurisée')
            ->view('emails.connect-user')
            ->with([
                'url' => route('connexion.connect', $this->token),
            ]);
    }

    public function buildValidateDemand()
    {
        return $this
            ->subject('Validez votre demande')
            ->view('emails.validate-demand')
            ->with([
                'url' => route('public.demand.validate', $this->token),
            ]);
    }
}