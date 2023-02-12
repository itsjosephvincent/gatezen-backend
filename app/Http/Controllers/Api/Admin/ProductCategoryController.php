<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\ProductCategoryServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $productCategoryService;

    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->productCategoryService->findProductCategories($request)->response();
    }
}
