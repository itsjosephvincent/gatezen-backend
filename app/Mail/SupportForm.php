<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $inquiry;

    public function __construct($name, $email, $subject, $inquiry)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.support.support-form')
            ->subject($this->subject)
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->inquiry
            ]);
    }
}
