<?php

namespace App\Listeners;

use App\Events\ZohoItemEvent;
use App\Jobs\ProcessZohoItem;

class SyncItemToZoho
{
    public function handle(ZohoItemEvent $event)
    {
        ProcessZohoItem::dispatch($event->product)
            ->onQueue('additems');
    }
}
