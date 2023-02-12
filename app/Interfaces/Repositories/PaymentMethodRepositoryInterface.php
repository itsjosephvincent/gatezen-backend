<?php

namespace App\Interfaces\Repositories;

interface PaymentMethodRepositoryInterface
{
    public function findMany(string $sortField, string $sortOrder);
}
