<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface PaymentServiceInterface
{
    public function saveCbdPreOrderData(string $address_type, Store $store);
    public function saveStripePaymentData(object $payload, Store $store);
    public function saveKlarnaPaymentData(object $payload, Store $store);
    public function checkPayment(object $payload, Store $store);
    public function stripePaymentSession(object $payload, Store $store);
    public function klarnaPaymentSession(object $payload, Store $store);
}
