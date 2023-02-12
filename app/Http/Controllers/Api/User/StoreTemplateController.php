<?php

namespace App\Http\Controllers\Api\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\StoreTemplateServiceInterface;
use Illuminate\Http\JsonResponse;

class StoreTemplateController extends Controller
{
    private $storeTemplateService;

    public function __construct(StoreTemplateServiceInterface $storeTemplateService)
    {
        $this->storeTemplateService = $storeTemplateService;
    }

    public function getStoreTemplate($storeId): JsonResponse
    {
        return $this->storeTemplateService->findStoreTemplateByStoreid($storeId)->response();
    }

    public function getStoreCategoryTemplate(Request $request, $storeCategroyId): JsonResponse
    {
        return $this->storeTemplateService->findStoreTemplatesByStoreCategoryId($request, $storeCategroyId)->response();
    }
}
