<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PaymentDetailsRepositoryInterface;
use App\Models\PaymentDetail;

class PaymentDetailsRepository implements PaymentDetailsRepositoryInterface
{
    public function findOneByToken($token)
    {
        return PaymentDetail::with([
            'payment',
            'payment_method',
        ])->where('payment_token', $token)->first();
    }

    public function create($createPaymentId, $paymentMethodId, $checkoutSessionId)
    {
        $createPaymentDetails = new PaymentDetail();
        $createPaymentDetails->payment_id = $createPaymentId;
        $createPaymentDetails->payment_method_id = $paymentMethodId;
        $createPaymentDetails->payment_token = $checkoutSessionId;
        $createPaymentDetails->save();
        return $createPaymentDetails->fresh();
    }
}
