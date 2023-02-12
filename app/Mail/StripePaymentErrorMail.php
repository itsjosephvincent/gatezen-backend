<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StripePaymentErrorMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $errorType;
    protected $errorMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($errorType, $errorMessage)
    {
        $this->errorType = $errorType;
        $this->errorMessage = $errorMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailSubject = 'Stripe Payment Failed';
        return $this->markdown('emails.error.StripeErrorMail')
            ->subject($emailSubject)
            ->with([
                'error_type' => $this->errorType,
                'error_message' => $this->errorMessage
            ]);
    }
}
