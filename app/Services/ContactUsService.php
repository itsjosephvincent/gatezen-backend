<?php

namespace App\Services;

use App\Interfaces\Services\ContactUsServiceInterface;
use App\Jobs\SendContactUsEmail;

class ContactUsService implements ContactUsServiceInterface
{
    public function sendContactUsEmail($payload, $store)
    {
        SendContactUsEmail::dispatch($payload->name, $payload->email, $payload->subject, $payload->message, $store)
            ->onQueue('sendemail');
    }
}
