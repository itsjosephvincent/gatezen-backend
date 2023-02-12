<?php

namespace App\Repositories;

use App\Models\ExternalData;
use App\Interfaces\Repositories\ExternalDataRepositoryInterface;

class ExternalDataRepository implements ExternalDataRepositoryInterface
{
    public function createProduct($itemId, $newZohoItem, $saveProduct)
    {
        $externalData = new ExternalData();
        $externalData->external_id = $itemId;
        $externalData->data = json_encode($newZohoItem);
        $externalData->external_data_type_id = 1; // 1 = Zoho Inventory
        $externalData->externable_type = 'App\Models\Product';
        $externalData->externable_id = $saveProduct->id;
        $externalData->save();

        return $externalData->fresh();
    }

    public function createCustomer($contactId, $newZohoCustomer, $saveProduct)
    {
        $externalData = new ExternalData();
        $externalData->external_id = $contactId;
        $externalData->data = json_encode($newZohoCustomer);
        $externalData->external_data_type_id = 2; // 2 = Zoho Contacts
        $externalData->externable_type = 'App\Models\Customer';
        $externalData->externable_id = $saveProduct->id;
        $externalData->save();

        return $externalData->fresh();
    }

    public function createSalesOrder($salesOrderId, $newZohoSalesOrder, $order)
    {
        $externalData = new ExternalData();
        $externalData->external_id = $salesOrderId;
        $externalData->data = json_encode($newZohoSalesOrder);
        $externalData->external_data_type_id = 3; // 3 = Zoho Sales Order
        $externalData->externable_id = $order->id;
        $externalData->externable_type = 'App\Models\Order';
        $externalData->save();

        return $externalData->fresh();
    }

    public function createInventoryAdjustmentExternalData($adjustedItemData, $orderDetails)
    {
        $externalData = new ExternalData();
        $externalData->external_id = $adjustedItemData->inventory_adjustment->inventory_adjustment_id;
        $externalData->data = json_encode($adjustedItemData);
        $externalData->external_data_type_id = 5; // 5 = Zoho Item Adjustment
        $externalData->externable_type = 'App\Models\Product';
        $externalData->externable_id = $orderDetails->product_id;
        $externalData->save();

        return $externalData->fresh();
    }

    public function createMailJetListContact($response, $userId)
    {
        $externalData = new ExternalData();
        $externalData->external_id = $response[0]['ContactID'];
        $externalData->data = json_encode($response);
        $externalData->external_data_type_id = 6; // 6 = Mail Jet Contact
        $externalData->externable_type = 'App\Models\User';
        $externalData->externable_id = $userId;
        $externalData->save();

        return $externalData->fresh();
    }

    public function findCustomerExternalData($userId)
    {
        return ExternalData::where('externable_type', 'App\Models\Customer')
            ->where('externable_id', $userId)
            ->where('external_data_type_id', '2')
            ->first();
    }

    public function findProductExternalData($productId)
    {
        return ExternalData::where('externable_type', 'App\Models\Product')
            ->where('externable_id', $productId)
            ->where('external_data_type_id', '1')
            ->first();
    }

    public function findInventoryAdjustmentExternalDataByProductId($orderDetails)
    {
        return ExternalData::where('externable_type', 'App\Models\Product')
            ->where('externable_id', $orderDetails->product_id)
            ->where('external_data_type_id', '5')
            ->first();
    }

    public function findMailJetListContactByUserId($userId)
    {
        return ExternalData::where('externable_type', 'App\Models\User')
            ->where('external_data_type_id', '6')
            ->where('externable_id', $userId)
            ->first();
    }

    public function updateMailJetListContactByUserId($response, $userId)
    {
        $external = ExternalData::where('externable_type', 'App\Models\User')
            ->where('external_data_type_id', '6')
            ->where('externable_id', $userId)
            ->first();
        $external->data = json_encode($response);
        $external->save();

        return $external->fresh();
    }
}
