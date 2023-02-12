<?php

namespace App\Interfaces\Services;

interface StoreServiceInterface
{
    public function findStores(object $payload);
    public function findStoresByUserId(object $payload, int $userId);
    public function findStore(int $storeId);
    public function createStore(object $payload);
    public function updateStore(object $payload, int $storeId);
    public function updateStoreTemplateToLatest(int $storeId);
    public function findStoresByLoggedInUser(object $payload);
}
