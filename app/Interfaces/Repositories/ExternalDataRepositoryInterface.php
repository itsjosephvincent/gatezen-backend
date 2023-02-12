<?php

namespace App\Interfaces\Repositories;

interface ExternalDataRepositoryInterface
{
    public function createProduct(string $itemId, object $newZohoItem, object $saveProduct);
    public function createCustomer(string $contactId, $newZohoCustomer, object $customer);
    public function createSalesOrder(string $salesOrderId, $newZohoSalesOrder, object $order);
    public function createInventoryAdjustmentExternalData(object $adjustedItemData, object $orderDetails);
    public function createMailJetListContact(array $response, int $userId);
    public function findCustomerExternalData(int $userId);
    public function findProductExternalData(int $productId);
    public function findInventoryAdjustmentExternalDataByProductId(object $orderDetails);
    public function findMailJetListContactByUserId(int $userId);
    public function updateMailJetListContactByUserId(array $response, int $userId);
}
