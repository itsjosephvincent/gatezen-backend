<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FaqCategoryRepositoryInterface;
use App\Models\FaqCategory;

class FaqCategoryRepository implements FaqCategoryRepositoryInterface
{
    public function findMany()
    {
        return FaqCategory::all();
    }

    public function findOneByCategoryName($payload)
    {
        return FaqCategory::where('name', $payload->category)->first();
    }
}
