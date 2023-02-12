<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreUpdateRequest;
use App\Http\Requests\StoreUpdateAdminRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Interfaces\Services\LogServiceInterface;
use App\Interfaces\Services\OrderServiceInterface;
use App\Interfaces\Services\StoreServiceInterface;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    private $logService;
    private $orderService;
    private $storeService;

    public function __construct(
        LogServiceInterface $logService,
        OrderServiceInterface $orderService,
        StoreServiceInterface $storeService,
    ) {
        $this->logService = $logService;
        $this->orderService = $orderService;
        $this->storeService = $storeService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->storeService->findStores($request)->response();
    }

    public function show($storeId): JsonResponse
    {
        return $this->storeService->findStore($storeId)->response();
    }

    public function getStoresPerUser(Request $request, $userId): JsonResponse
    {
        return $this->storeService->findStoresByUserId($request, $userId)->response();
    }

    public function update(StoreUpdateAdminRequest $request, $storeId): JsonResponse
    {
        $payload = (object) $request->only([
            'is_private',
            'is_wholesaler',
            'status',
            'store_category_id',
            'store_name',
            'url',
        ]);

        return $this->storeService->updateStore($payload, $storeId)->response();
    }

    public function updateTemplateToLatest($storeId): JsonResponse
    {
        return $this->storeService->updateStoreTemplateToLatest($storeId)->response();
    }

    public function showStoreOrders(Request $request, $storeId): JsonResponse
    {
        return $this->orderService->findStoreOrders($request, $storeId)->response();
    }

    public function showStoreLogs(Request $request, $storeId): JsonResponse
    {
        return $this->logService->findStoreLogs($request, $storeId)->response();
    }
}
