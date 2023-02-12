<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductListingRequest;
use App\Interfaces\Services\ProductServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(ProductListingRequest $request, Store $store): JsonResponse
    {
        return $this->productService->findStoreProducts($request, $store)->response();
    }

    public function show($productId): JsonResponse
    {
        return $this->productService->findProduct($productId)->response();
    }

    public function showBySlug($slug): JsonResponse
    {
        return $this->productService->findProductSlug($slug)->response();
    }
}
