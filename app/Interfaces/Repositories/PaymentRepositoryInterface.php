<?php

namespace App\Interfaces\Repositories;

interface PaymentRepositoryInterface
{
    public function createStripePayment(int $createOrderId, object $checkOutSession);
    public function createKlarnaPayment(int $createOrderId, array $klarnaData);
    public function findStripe();
    public function findKlarna();
}
