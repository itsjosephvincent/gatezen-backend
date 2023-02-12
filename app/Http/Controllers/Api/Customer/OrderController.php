<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\OrderServiceInterface;
use App\Interfaces\Services\SalesServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;
    private $salesService;

    public function __construct(OrderServiceInterface $orderService, SalesServiceInterface $salesService)
    {
        $this->orderService = $orderService;
        $this->salesService = $salesService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->orderService->findCustomerOrders($request)->response();
    }

    public function show($orderId): JsonResponse
    {
        return $this->salesService->findSale($orderId)->response();
    }
}
