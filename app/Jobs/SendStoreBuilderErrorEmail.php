<?php

namespace App\Jobs;

use App\Mail\StoreBuilderErrorEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendStoreBuilderErrorEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $errorType;
    protected $errorMessage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($errorType, $errorMessage)
    {
        $this->errorType = $errorType;
        $this->errorMessage = $errorMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(env('ADMIN_EMAIL'))->send(new StoreBuilderErrorEmail($this->errorType, $this->errorMessage));
    }
}
