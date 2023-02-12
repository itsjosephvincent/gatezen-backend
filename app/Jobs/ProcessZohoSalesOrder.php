<?php

namespace App\Jobs;

use App\Repositories\ExternalDataRepository;
use App\Zoho\Sales\AddSalesOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessZohoSalesOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $salesOrder;
    protected $externalData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
        $this->salesOrder = new AddSalesOrder();
        $this->externalData = new ExternalDataRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $salesOrderData = $this->salesOrder->index($this->order);
        $this->externalData->createSalesOrder($salesOrderData['salesorder']['salesorder_id'], $salesOrderData, $this->order);
    }
}
