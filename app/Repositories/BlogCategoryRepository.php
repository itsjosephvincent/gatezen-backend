<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    public function findMany()
    {
        return BlogCategory::all();
    }
}
