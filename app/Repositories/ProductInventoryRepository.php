<?php

namespace App\Repositories;

use App\Models\ProductInventory;
use App\Interfaces\Repositories\ProductInventoryRepositoryInterface;
use App\Models\Product;

class ProductInventoryRepository implements ProductInventoryRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder, $productId)
    {
        return ProductInventory::where('product_id', $productId)
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($orderDetails, $addNewExternalDataId)
    {

        $product = Product::findOrFail($orderDetails->product_id);

        $productInventory = new ProductInventory();
        $productInventory->product_id = $product->id;
        $productInventory->before_quantity = $product->quantity;
        $productInventory->adjustment_quantity = $orderDetails->quantity;
        $productInventory->after_quantity = $product->quantity - $orderDetails->quantity;
        $productInventory->reference_type = 'App\Models\ExternalData';
        $productInventory->reference_id = $addNewExternalDataId;
        $productInventory->description = 'Item Adjustment';
        $productInventory->save();
        return $productInventory->fresh();
    }
}
