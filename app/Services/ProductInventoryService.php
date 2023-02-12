<?php

namespace App\Services;

use App\Traits\SortingTraits;
use App\Http\Resources\ProductInventoryResource;
use App\Interfaces\Services\ProductInventoryServiceInterface;
use App\Interfaces\Repositories\ProductInventoryRepositoryInterface;

class ProductInventoryService implements ProductInventoryServiceInterface
{
    use SortingTraits;

    private $productInventoryRepository;

    public function __construct(ProductInventoryRepositoryInterface $productInventoryRepository)
    {
        $this->productInventoryRepository = $productInventoryRepository;
    }

    public function findProductInventories($payload, $productId)
    {
        $sortField = $this->sortField($payload, 'name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $productInventoryList = $this->productInventoryRepository->findMany($payload, $sortField, $sortOrder, $productId);
        return ProductInventoryResource::collection($productInventoryList);
    }
}
