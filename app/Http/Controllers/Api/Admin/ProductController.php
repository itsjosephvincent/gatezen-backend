<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\Services\ProductServiceInterface;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->productService->findProducts($request)->response();
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'store_category_id',
            'name',
            'description',
            'price',
            'retail_price',
            'wholesale_price',
            'status',
            'product_categories'
        ]);

        return $this->productService->createProduct($payload)->response();
    }

    public function show($productId): JsonResponse
    {
        return $this->productService->findProduct($productId)->response();
    }

    public function update(ProductRequest $request, $productId): JsonResponse
    {
        $payload = (object) $request->only([
            'store_category_id',
            'name',
            'description',
            'price',
            'retail_price',
            'wholesale_price',
            'status',
            'product_categories'
        ]);

        return $this->productService->updateProduct($payload, $productId)->response();
    }
}
