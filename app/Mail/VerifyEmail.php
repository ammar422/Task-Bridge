<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Laravel\SerializableClosure\Serializers\Signed;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    // Constructor to accept user data
    public function __construct($user)
    {
        $this->user = $user;
    }
    // Build the message
    public function build()
    {
        return $this->view('emails.verfiy') // Use the Markdown email view
            ->subject('Welcome to Task Bridge') // Email subject
            ->with([
                'name' => $this->user->name,
                'email' => $this->user->email,
                'title' => $this->user->title,
                'verificationUrl' => URL::signedRoute('verification.verify', [
                    'id' => $this->user->id, 
                    'hash' => sha1($this->user->email) 
                ])
            ]);
    }
}
