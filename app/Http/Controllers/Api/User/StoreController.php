<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRequest;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Interfaces\Services\StoreServiceInterface;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    private $storeService;

    public function __construct(StoreServiceInterface $storeService)
    {
        $this->storeService = $storeService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->storeService->findStoresByLoggedInUser($request)->response();
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'store_category_id',
            'url',
            'store_name'
        ]);

        return $this->storeService->createStore($payload)->response();
    }

    public function show($storeId): JsonResponse
    {
        return $this->storeService->findStore($storeId)->response();
    }

    public function update(StoreUpdateUserRequest $request, $storeId): JsonResponse
    {
        $payload = (object) $request->only([
            'store_name',
            'status',
        ]);

        return $this->storeService->updateStore($payload, $storeId)->response();
    }

    public function updateTemplateToLatest($storeId): JsonResponse
    {
        return $this->storeService->updateStoreTemplateToLatest($storeId)->response();
    }
}
