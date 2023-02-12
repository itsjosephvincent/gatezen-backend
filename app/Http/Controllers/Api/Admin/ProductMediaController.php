<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductMediaStoreRequest;
use App\Http\Requests\ProductMediaUpdateRequest;
use App\Interfaces\Services\ProductMediaServiceInterface;
use Illuminate\Http\JsonResponse;

class ProductMediaController extends Controller
{
    private $productMediaService;

    public function __construct(ProductMediaServiceInterface $productMediaService)
    {
        $this->productMediaService = $productMediaService;
    }

    public function getMediasPerProduct(Request $request, $productId): JsonResponse
    {
        return $this->productMediaService->findProductMedias($request, $productId)->response();
    }

    public function store(ProductMediaStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'product_id',
            'name',
            'media_url',
            'is_featured',
        ]);

        return $this->productMediaService->createProductMedia($payload)->response();
    }

    public function show($mediaId): JsonResponse
    {
        return $this->productMediaService->findProductMedia($mediaId)->response();
    }

    public function updateMedia(ProductMediaUpdateRequest $request, $mediaId): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'media_url',
            'is_featured',
        ]);

        return $this->productMediaService->updateProductMedia($payload, $mediaId)->response();
    }

    public function destroy($mediaId)
    {
        return $this->productMediaService->deleteProductMedia($mediaId);
    }
}
