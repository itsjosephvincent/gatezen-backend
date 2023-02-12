<?php

namespace App\Services;

use Throwable;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\StoreCategoryResource;
use App\Interfaces\Services\StoreCategoryServiceInterface;
use App\Interfaces\Repositories\StoreCategoryRepositoryInterface;

class StoreCategoryService implements StoreCategoryServiceInterface
{
    use SortingTraits;

    private $storeCategoryRepository;

    public function __construct(StoreCategoryRepositoryInterface $storeCategoryRepository)
    {
        $this->storeCategoryRepository = $storeCategoryRepository;
    }

    public function findStoreCategories($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $productList = $this->storeCategoryRepository->findMany($payload, $sortField, $sortOrder);
        return StoreCategoryResource::collection($productList);
    }

    public function findStoreCategoriesNoPagination()
    {
        $productList = $this->storeCategoryRepository->findManyWithNoPagination();
        return StoreCategoryResource::collection($productList);
    }

    public function createStoreCategory($payload)
    {
        $storeCategory = $this->storeCategoryRepository->create($payload);
        return new StoreCategoryResource($storeCategory);
    }

    public function findStoreCategory($storeCategoryId)
    {
        $storeCategory = $this->storeCategoryRepository->findOneById($storeCategoryId);
        return new StoreCategoryResource($storeCategory);
    }

    public function updateStoreCategory($payload, $storeCategoryId)
    {
        DB::beginTransaction();

        try {
            $updateStoreCategory = $this->storeCategoryRepository->update($payload, $storeCategoryId);
            DB::commit();

            return new StoreCategoryResource($updateStoreCategory);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateStoreCategoryImage($payload, $storeCategoryId)
    {
        $storeCategory = $this->storeCategoryRepository->updateImage($payload, $storeCategoryId);
        return new StoreCategoryResource($storeCategory);
    }

    public function updateStoreCategoryLogo($payload, $storeCategoryId)
    {
        $storeCategory = $this->storeCategoryRepository->updateImage($payload, $storeCategoryId);
        return new StoreCategoryResource($storeCategory);
    }
}
