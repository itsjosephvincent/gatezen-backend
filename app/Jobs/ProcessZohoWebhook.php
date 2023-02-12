<?php

namespace App\Jobs;

use App\Zoho\Inventory\SyncInventory;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessZohoWebhook extends SpatieProcessWebhookJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(SyncInventory $syncInventory)
    {
        $syncInventory->index($this->webhookCall);
    }
}
