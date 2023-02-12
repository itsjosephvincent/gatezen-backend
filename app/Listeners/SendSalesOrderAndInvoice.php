<?php

namespace App\Listeners;

use App\Events\PaymentCompleteEvent;
use App\Jobs\ProcessZohoSalesInvoice;
use App\Jobs\ProcessZohoSalesOrder;

class SendSalesOrderAndInvoice
{
    public function handle(PaymentCompleteEvent $event)
    {
        ProcessZohoSalesOrder::dispatch($event->order)
            ->onQueue('addsalesorder');

        ProcessZohoSalesInvoice::dispatch($event->order)
            ->onQueue('addsalesinvoice');
    }
}
