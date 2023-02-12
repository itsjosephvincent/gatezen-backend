<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $token;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $token)
    {
        $this->name = $name;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailSubject = 'Forgot Password';
        return $this->markdown('emails.password.user-forgot-password')
            ->subject($emailSubject)
            ->with([
                'name' => $this->name,
                'token' => $this->token,
            ]);
    }
}
