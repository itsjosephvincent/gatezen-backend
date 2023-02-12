<?php

namespace App\Jobs;

use App\Mail\AdminOrderConfirmation;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\Store;
use App\Repositories\OrderDetailsRepository;
use App\Repositories\StoreCategoryRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $order;
    protected $shippingMethod;
    protected $shippingFee;
    protected $orderDetailsRepository;
    protected $store;
    protected $storeCategoryRepository;

    public function __construct($email, Order $order, $shippingMethod, $shippingFee, Store $store)
    {
        $this->email = $email;
        $this->order = $order;
        $this->shippingMethod = $shippingMethod;
        $this->shippingFee = $shippingFee;
        $this->store = $store;
        $this->orderDetailsRepository = new OrderDetailsRepository();
        $this->storeCategoryRepository = new StoreCategoryRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $orderDetails = $this->orderDetailsRepository->findByOrderId($this->order->id);
        $storeCategory = $this->storeCategoryRepository->findOneById($this->store->store_category_id);
        $emails = json_decode($storeCategory->order_notification_emails, true) ?? [];
        array_push($emails, env('ADMIN_ORDER_EMAIL'));

        Mail::to($this->email)->send(new OrderConfirmationMail($this->order, $orderDetails, $this->shippingMethod, $this->shippingFee, $this->store));
        Mail::to($emails)->send(new AdminOrderConfirmation($this->order, $orderDetails, $this->shippingMethod, $this->shippingFee, $this->store));
    }
}
