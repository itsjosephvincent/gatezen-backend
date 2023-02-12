<?php

namespace App\Interfaces\Repositories;

interface PaymentDetailsRepositoryInterface
{
    public function findOneByToken(string $token);
    public function create(int $createPayment, int $paymentMethod, int $payload);
}
