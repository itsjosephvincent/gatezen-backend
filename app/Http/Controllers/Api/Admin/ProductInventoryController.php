<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\ProductInventoryServiceInterface;
use Illuminate\Http\JsonResponse;

class ProductInventoryController extends Controller
{
    private $productInventoryService;

    public function __construct(ProductInventoryServiceInterface $productInventoryService)
    {
        $this->productInventoryService = $productInventoryService;
    }

    public function productInventoryList(Request $request, $productId): JsonResponse
    {
        return $this->productInventoryService->findProductInventories($request, $productId)->response();
    }
}
