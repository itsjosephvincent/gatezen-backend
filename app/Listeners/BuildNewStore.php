<?php

namespace App\Listeners;

use App\Events\StoreBuilderEvent;
use App\Jobs\ProcessStoreBuilderScript;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuildNewStore
{
    public function handle(StoreBuilderEvent $event)
    {
        ProcessStoreBuilderScript::dispatch($event->store)
            ->onQueue('addstore');
    }
}
