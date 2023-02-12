<?php

namespace App\Jobs;

use App\Repositories\ExternalDataRepository;
use App\Zoho\Sales\AddInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessZohoSalesInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $salesInvoice;
    protected $externalData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
        $this->salesInvoice = new AddInvoice();
        $this->externalData = new ExternalDataRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $salesInvoiceData = $this->salesInvoice->index($this->order);
        $this->externalData->createSalesOrder($salesInvoiceData['invoice']['invoice_id'], $salesInvoiceData, $this->order);
    }
}
