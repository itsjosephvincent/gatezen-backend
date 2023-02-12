<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\CustomerForgotPassword;
use App\Models\Store;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCustomerForgotPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $store;
    protected $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, Store $store, $token)
    {
        $this->email = $email;
        $this->store = $store;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new CustomerForgotPassword($this->store, $this->token));
    }
}
