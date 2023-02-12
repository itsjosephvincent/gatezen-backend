<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryStoreRequest;
use App\Http\Requests\StoreCategoryUpdateImageRequest;
use App\Http\Requests\StoreCategoryUpdateLogoRequest;
use App\Http\Requests\StoreCategoryUpdateRequest;
use App\Interfaces\Services\StoreCategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class StoreCategoryController extends Controller
{
    private $storeCategoryService;

    public function __construct(StoreCategoryServiceInterface $storeCategoryService)
    {
        $this->storeCategoryService = $storeCategoryService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->storeCategoryService->findStoreCategories($request)->response();
    }

    public function getAllStoreCategories(): JsonResponse
    {
        return $this->storeCategoryService->findStoreCategoriesNoPagination()->response();
    }

    public function store(StoreCategoryStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'description',
            'status'
        ]);

        return $this->storeCategoryService->createStoreCategory($payload)->response();
    }

    public function show($storeCategoryId): JsonResponse
    {
        return $this->storeCategoryService->findStoreCategory($storeCategoryId)->response();
    }

    public function update(StoreCategoryUpdateRequest $request, $storeCategoryId): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'description',
            'status',
        ]);

        return $this->storeCategoryService->updateStoreCategory($payload, $storeCategoryId)->response();
    }

    public function updateImage(StoreCategoryUpdateImageRequest $request, $storeCategoryId): JsonResponse
    {
        $payload = (object) $request->only([
            'img_url'
        ]);

        return $this->storeCategoryService->updateStoreCategoryImage($payload, $storeCategoryId)->response();
    }

    public function updateLogo(StoreCategoryUpdateLogoRequest $request, $storeCategoryId): JsonResponse
    {
        $payload = (object) $request->only([
            'logo_url'
        ]);

        return $this->storeCategoryService->updateStoreCategoryImage($payload, $storeCategoryId)->response();
    }
}
