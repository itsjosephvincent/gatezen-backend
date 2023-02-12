<?php

namespace App\Zoho\Inventory;

use App\Http\Resources\ProductInventoryResource;
use App\Http\Resources\WebhookResource;
use App\Models\ExternalData;
use App\Models\Product;
use App\Models\ProductInventory;
use Throwable;

class SyncInventory
{
    public function index($webhook)
    {
        try {
            $payload = $webhook->payload;

            $data = json_decode($payload['JSONString'], true);

            $externalInventoryAdjustmentData = ExternalData::where('external_id', $data['inventory_adjustment']['inventory_adjustment_id'])
                ->where('externable_type', 'App\Models\Product')
                ->first();

            $externalProductData = ExternalData::where('external_id', $data['inventory_adjustment']['line_items'][0]['item_id'])
                ->where('externable_type', 'App\Models\Product')
                ->first();

            if (!$externalInventoryAdjustmentData) {

                $product = Product::findOrFail($externalProductData->externable_id);

                $externalData = new ExternalData();
                $externalData->external_id = $data['inventory_adjustment']['inventory_adjustment_id'];
                $externalData->data = json_encode($data);
                $externalData->external_data_type_id = 5; // Zoho Item Adjustment
                $externalData->externable_type = 'App\Models\Product';
                $externalData->externable_id = $externalProductData->externable_id;
                $externalData->save();

                $productInventory = new ProductInventory();
                $productInventory->product_id = $product->id;
                $productInventory->before_quantity = $product->quantity;
                $productInventory->adjustment_quantity = $data['inventory_adjustment']['line_items'][0]['quantity_adjusted'];
                $productInventory->after_quantity = $data['inventory_adjustment']['line_items'][0]['quantity_adjusted'] + $product->quantity;
                $productInventory->reference_type = 'App\Models\ExternalData';
                $productInventory->reference_id = $externalData->id;
                $productInventory->description = $data['inventory_adjustment']['reason'];
                $productInventory->save();

                $product->quantity = $productInventory->after_quantity;
                $product->save();

                return new ProductInventoryResource($productInventory);
            }

            return new WebhookResource($externalInventoryAdjustmentData);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
