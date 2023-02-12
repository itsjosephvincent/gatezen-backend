<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Interfaces\Services\SalesServiceInterface;
use Illuminate\Http\JsonResponse;

class SalesController extends Controller
{
    private $salesService;

    public function __construct(SalesServiceInterface $salesService)
    {
        $this->salesService = $salesService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->salesService->findSales($request)->response();
    }

    public function show($orderId)
    {
        return $this->salesService->findSale($orderId);
    }

    public function updateStatus(OrderUpdateRequest $request)
    {
        $payload = (object) $request->only([
            'status',
            'order_id'
        ]);

        return $this->salesService->updateOrderStatus($payload);
    }

    public function getProductSales(Request $request, $productId): JsonResponse
    {
        return $this->salesService->findProductSales($request, $productId)->response();
    }
}
