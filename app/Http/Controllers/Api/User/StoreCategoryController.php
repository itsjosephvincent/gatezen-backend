<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\StoreCategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class StoreCategoryController extends Controller
{
    private $storeCategoryService;

    public function __construct(StoreCategoryServiceInterface $storeCategoryService)
    {
        $this->storeCategoryService = $storeCategoryService;
    }

    public function getAllStoreCategories(): JsonResponse
    {
        return $this->storeCategoryService->findStoreCategoriesNoPagination()->response();
    }
}
