<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchCategory = $payload->category;
        return Product::with([
            'medias',
            'store_category',
            'category_product',
            'category_product.product_category',
            'vat'
        ])->filter($payload->all())
            ->when($searchCategory !== null, function ($query) use ($searchCategory) {
                $query->whereHas(
                    'store_category',
                    function ($query) use ($searchCategory) {
                        $query->where('name', 'like', $searchCategory . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyByStore($payload, $categoryProducts, $storeCategoryId, $sortField, $sortOrder)
    {
        return Product::with([
            'medias',
            'store_category',
            'category_product',
            'category_product.product_category',
            'vat'
        ])->when(!empty($categoryProducts), function ($query) use ($categoryProducts) {
            return $query->whereIn('id', $categoryProducts);
        })->where('store_category_id', $storeCategoryId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneById($productId)
    {
        return Product::with([
            'medias',
            'category_product',
            'category_product.product_category',
            'store_category',
            'store_category.stores'
        ])->findOrFail($productId);
    }

    public function findOneBySlug($slug)
    {
        return Product::with([
            'medias',
            'category_product',
            'category_product.product_category',
            'store_category',
            'store_category.stores',
            'vat'
        ])->where('slug', $slug)->first();
    }

    public function create($payload)
    {
        $product = new Product();
        $product->store_category_id = $payload->store_category_id;
        $product->vat_id = 1;
        $product->name = $payload->name;
        $product->description = $payload->description;
        $product->price = $payload->price;
        $product->retail_price = $payload->retail_price;
        $product->wholesale_price = $payload->wholesale_price;
        $product->status = $payload->status;
        $product->reorder_level = 0;
        $product->save();
        return $product->fresh(
            'medias',
            'category_product',
            'category_product.product_category',
            'store_category',
        );
    }

    public function update($payload, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->store_category_id = $payload->store_category_id ? $payload->store_category_id : $product->store_category_id;
        $product->vat_id = isset($payload->vat_id) ? $payload->vat_id : $product->vat_id;
        $product->name = $payload->name;
        $product->description = $payload->description;
        $product->price = $payload->price;
        $product->retail_price = $payload->retail_price;
        $product->wholesale_price = $payload->wholesale_price;
        $product->reorder_level = isset($payload->reorder_level) ? $payload->reorder_level : $product->reorder_level;
        $product->status = $payload->status;
        $product->release_date = isset($payload->release_date) ? $payload->release_date : $product->release_date;
        $product->save();
        return $product->fresh(
            'medias',
            'store_category',
            'category_product',
            'category_product.product_category',
        );
    }

    public function getAllProductCount()
    {
        return Product::all()->count();
    }
}
