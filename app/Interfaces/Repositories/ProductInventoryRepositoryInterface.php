<?php

namespace App\Interfaces\Repositories;

interface ProductInventoryRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder, int $productId);
    public function create(object $orderDetails, int $addNewExternalDataId);
}
