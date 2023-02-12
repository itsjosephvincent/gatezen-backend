<?php

namespace App\Listeners;

use App\Events\OrderCreatedEvent;
use App\Jobs\ProcessZohoItemAdjustment;
use App\Notifications\SalesNotification;
use App\Repositories\AdminRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class OrderCreatedEventListener
{
    private $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCreatedEvent  $event
     * @return void
     */
    public function handle(OrderCreatedEvent $event)
    {
        $admins = $this->adminRepository->getAdmins();

        Notification::sendNow($admins, new SalesNotification($event->order));
    }
}
