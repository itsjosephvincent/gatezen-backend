<?php

namespace App\Services;

use App\Http\Resources\ProductCategoryResource;
use App\Interfaces\Repositories\ProductCategoryRepositoryInterface;
use App\Interfaces\Services\ProductCategoryServiceInterface;
use App\Traits\SortingTraits;

class ProductCategoryService implements ProductCategoryServiceInterface
{
    use SortingTraits;

    private $productCategoryRepository;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function findProductCategories($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $productCategoryList = $this->productCategoryRepository->findMany($payload, $sortField, $sortOrder);

        return ProductCategoryResource::collection($productCategoryList);
    }
}
