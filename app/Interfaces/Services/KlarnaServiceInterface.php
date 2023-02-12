<?php

namespace App\Interfaces\Services;

interface KlarnaServiceInterface
{
    public function makePayment(array $lineitems, object $payload, $shippingMethod, $shippingKey, $shippingFee);
    public function readOrder(string $checkOutSessionId);
}
