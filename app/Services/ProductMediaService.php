<?php

namespace App\Services;

use Throwable;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductMediaResource;
use App\Interfaces\Services\ProductMediaServiceInterface;
use App\Interfaces\Repositories\ProductMediaRepositoryInterface;

class ProductMediaService implements ProductMediaServiceInterface
{
    use SortingTraits;

    private $productMediaRepository;

    public function __construct(ProductMediaRepositoryInterface $productMediaRepository)
    {
        $this->productMediaRepository = $productMediaRepository;
    }

    public function findProductMedias($payload, $productId)
    {
        $sortField = $this->sortField($payload, 'name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $productMediaList = $this->productMediaRepository->findMany($payload, $sortField, $sortOrder, $productId);
        return ProductMediaResource::collection($productMediaList);
    }

    public function createProductMedia($payload)
    {
        DB::beginTransaction();

        try {
            $productMedia = $this->productMediaRepository->create($payload);
            DB::commit();

            return new ProductMediaResource($productMedia);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function findProductMedia($mediaId)
    {
        $productMedia = $this->productMediaRepository->findOneById($mediaId);
        return new ProductMediaResource($productMedia);
    }

    public function updateProductMedia($payload, $mediaId)
    {
        DB::beginTransaction();

        try {
            $updateProduct = $this->productMediaRepository->update($payload, $mediaId);
            DB::commit();

            return new ProductMediaResource($updateProduct);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function deleteProductMedia($mediaId)
    {
        DB::beginTransaction();

        try {
            $deleteProductMedia = $this->productMediaRepository->delete($mediaId);
            DB::commit();
            return $deleteProductMedia;
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
