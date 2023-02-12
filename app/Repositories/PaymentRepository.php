<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PaymentRepositoryInterface;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function createStripePayment($createOrderId, $checkOutSession)
    {
        $createPayment = new Payment();
        $createPayment->order_id = $createOrderId;
        $createPayment->amount = $checkOutSession->amount_total / 100;
        $createPayment->reference = date('mdY-His-') . Str::random(8);
        $createPayment->status = $checkOutSession->payment_status;
        $createPayment->paid_at = Carbon::now();
        $createPayment->save();
        return $createPayment->fresh();
    }

    public function createKlarnaPayment($createOrderId, $klarnaData)
    {
        $createPayment = new Payment();
        $createPayment->order_id = $createOrderId;
        $createPayment->amount = $klarnaData['order_amount'] / 100;
        $createPayment->reference = date('mdY-His-') . Str::random(8);
        $createPayment->status = 'paid';
        $createPayment->paid_at = Carbon::now();
        $createPayment->save();
        return $createPayment->fresh();
    }

    public function findStripe()
    {
        return PaymentMethod::where('name', 'Stripe')->first();
    }

    public function findKlarna()
    {
        return PaymentMethod::where('name', 'Klarna')->first();
    }
}
