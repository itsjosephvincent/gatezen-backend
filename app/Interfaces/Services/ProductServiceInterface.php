<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface ProductServiceInterface
{
    public function findProducts(object $payload);
    public function findStoreProducts(object $payload, Store $store);
    public function findProduct(int $productId);
    public function findProductSlug(string $slug);
    public function createProduct(object $payload);
    public function updateProduct(object $payload, int $productId);
}
