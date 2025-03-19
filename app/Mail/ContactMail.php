<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this->from($this->contactData['email'])
                    ->subject('New Contact Message from ' . $this->contactData['name'])
                    ->view('emails.contact')
                    ->with('contactData', $this->contactData);
    }
}
