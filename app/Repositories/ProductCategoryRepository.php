<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        return ProductCategory::orderBy($sortField, $sortOrder)->get();
    }
}
