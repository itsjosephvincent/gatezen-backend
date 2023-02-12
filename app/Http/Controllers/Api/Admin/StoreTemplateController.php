<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateUpdateRequest;
use App\Http\Requests\StoreTemplateImageUpdateRequest;
use App\Http\Requests\StoreTemplateStoreRequest;
use App\Interfaces\Services\StoreTemplateServiceInterface;
use Illuminate\Http\JsonResponse;

class StoreTemplateController extends Controller
{
    private $storeTemplateService;

    public function __construct(StoreTemplateServiceInterface $storeTemplateService)
    {
        $this->storeTemplateService = $storeTemplateService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->storeTemplateService->findStoreTemplates($request)->response();
    }

    public function store(StoreTemplateStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'store_category_id',
            'name',
            'description',
            'is_active',
            'repo_url',
            'version'
        ]);

        return $this->storeTemplateService->createStoreTemplate($payload)->response();
    }
    public function show($storeTemplateId): JsonResponse
    {
        return $this->storeTemplateService->findStoreTemplate($storeTemplateId)->response();
    }

    public function update(StoreTemplateUpdateRequest $request, $storeTemplateId): JsonResponse
    {
        $payload = (object) $request->only([
            'store_category_id',
            'name',
            'description',
            'is_active',
            'repo_url',
            'version'
        ]);

        return $this->storeTemplateService->updateStoreTemplate($payload, $storeTemplateId)->response();
    }

    public function updateTemplateImage(StoreTemplateImageUpdateRequest $request, $storeTemplateId): JsonResponse
    {
        $payload = (object) $request->only([
            'image_url'
        ]);

        return $this->storeTemplateService->updateStoreTemplatePhoto($payload, $storeTemplateId)->response();
    }
}
