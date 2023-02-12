<?php

namespace App\Jobs;

use App\Exceptions\Zoho\CustomerAlreadyExistException;
use App\Models\Customer;
use App\Repositories\ExternalDataRepository;
use App\Zoho\Customer\AddNewCustomer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class ProcessZohoContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer;
    protected $addZohoCustomer;
    protected $externalData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
        $this->addZohoCustomer = new AddNewCustomer();
        $this->externalData = new ExternalDataRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $result = $this->addZohoCustomer->index($this->customer);
            $this->externalData->createCustomer($result['contact']['contact_id'], $result, $this->customer);
        } catch (Throwable $e) {
            throw new CustomerAlreadyExistException();
        }
    }
}
