<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\AdminForgotPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAdminForgotPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $first_name;
    protected $last_name;
    protected $email;
    protected $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($first_name, $last_name, $email, $token)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $email = $this->email;
        $token = $this->token;

        Mail::to($email)->send(new AdminForgotPassword($first_name, $last_name, $token));
    }
}
