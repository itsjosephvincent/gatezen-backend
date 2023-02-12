<?php

namespace App\Interfaces\Repositories;

interface ProductCategoryRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
}
