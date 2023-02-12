<?php

namespace App\Interfaces\Services;

interface ProductInventoryServiceInterface
{
    public function findProductInventories(object $payload, int $productId);
}
