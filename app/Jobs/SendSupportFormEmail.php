<?php

namespace App\Jobs;

use App\Mail\SupportForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSupportFormEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;
    private $email;
    private $subject;
    private $inquiry;

    public function __construct($name, $email, $subject, $inquiry)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->inquiry = $inquiry;
    }

    public function handle()
    {
        Mail::to(env('ADMIN_EMAIL'))
            ->send(new SupportForm($this->name, $this->email, $this->subject, $this->inquiry));
    }
}
