<?php

namespace App\Listeners;

use App\Events\ZohoContactEvent;
use App\Jobs\ProcessZohoContact;

class SyncCustomerToZoho
{
    public function handle(ZohoContactEvent $event)
    {
        ProcessZohoContact::dispatch($event->customer)
            ->onQueue('addcustomers');
    }
}
