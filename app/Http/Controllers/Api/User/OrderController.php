<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\OrderServiceInterface;
use App\Interfaces\Services\SalesServiceInterface;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private $salesService;
    private $orderService;

    public function __construct(SalesServiceInterface $salesService, OrderServiceInterface $orderService)
    {
        $this->salesService = $salesService;
        $this->orderService = $orderService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->salesService->findUserSales($request)->response();
    }

    public function getSalesList(Request $request, $storeId): JsonResponse
    {
        return $this->orderService->findStoreOrders($request, $storeId)->response();
    }

    public function show($orderId): JsonResponse
    {
        return $this->salesService->findSale($orderId)->response();
    }
}
