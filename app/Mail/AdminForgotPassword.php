<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $first_name;
    protected $last_name;
    protected $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $last_name, $token)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
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

        return $this->markdown('emails.password.admin-forgot-password')
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject($emailSubject)
            ->with([
                'token' => $this->token,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name
            ]);
    }
}
