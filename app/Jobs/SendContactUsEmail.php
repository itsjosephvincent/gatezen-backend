<?php

namespace App\Jobs;

use App\Mail\ContactUs;
use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactUsEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;
    private $email;
    private $subject;
    private $message;
    private $store;

    public function __construct($name, $email, $subject, $message, Store $store)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->store = $store;
    }

    public function handle()
    {
        Mail::to(env('ADMIN_EMAIL'))
            ->send(new ContactUs($this->name, $this->email, $this->subject, $this->message, $this->store));
    }
}
