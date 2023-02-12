<?php

namespace App\Interfaces\Repositories;

interface CategoryProductRepositoryInterface
{
    public function create(int $productId, int $productCategoryId);
    public function update(int $productId, object $payload);
}
