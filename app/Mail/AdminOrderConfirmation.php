<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Store;
use App\Repositories\StoreCategoryRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $orderDetails;
    protected $shippingMethod;
    protected $shippingFee;
    protected $store;
    protected $storeCategoryRepository;

    public function __construct(Order $order, $orderDetails, $shippingMethod, $shippingFee, Store $store)
    {
        $this->order = $order;
        $this->orderDetails = $orderDetails;
        $this->shippingMethod = $shippingMethod;
        $this->shippingFee = $shippingFee;
        $this->store = $store;
        $this->storeCategoryRepository = new StoreCategoryRepository();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $storeCategory = $this->storeCategoryRepository->findOneById($this->store->store_category_id);

        $emailSubject = '';
        $discount = 0.00;
        if ($storeCategory->id == 10) {
            $discount = 0.20;
            $emailSubject = 'Gatezen Natural Pre-Order Confirmation';
        } else if ($storeCategory->id == 5) {
            $emailSubject = 'Hauger Order Confirmation';
        } else {
            $emailSubject = 'Saint Rochés Order Confirmation';
        }

        return $this->view('emails.order.admin-order-confirmation')
            ->subject($emailSubject)
            ->with([
                'logo' => $storeCategory->logo_url,
                'order' => $this->order,
                'discount' => $discount,
                'shippingMethod' => $this->shippingMethod,
                'shippingFee' => $this->shippingFee,
                'orderDetails' => $this->orderDetails,
                'storeCategorId' => $this->store->store_category_id,
                'total' => $this->order->order_total
            ]);
    }
}
