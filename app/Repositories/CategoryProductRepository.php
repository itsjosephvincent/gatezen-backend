<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CategoryProductRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Models\CategoryProduct;

class CategoryProductRepository implements CategoryProductRepositoryInterface
{
    private $prodcutRepository;

    public function __construct(ProductRepositoryInterface $prodcutRepository)
    {
        $this->prodcutRepository = $prodcutRepository;
    }

    public function create($productId, $productCategoryId)
    {
        $categoryProduct = new CategoryProduct();
        $categoryProduct->product_id = $productId;
        $categoryProduct->product_category_id = $productCategoryId;
        $categoryProduct->save();
        return $categoryProduct->fresh();
    }

    public function update($productId, $payload)
    {
        CategoryProduct::where('product_id', $productId)->delete();
        $productCategoryIds = $payload->product_categories;
        for ($i = 0; $i < count($payload->product_categories); $i++) {
            $this->create($productId, $productCategoryIds[$i]);
        }

        return $this->prodcutRepository->findOneById($productId);
    }
}
