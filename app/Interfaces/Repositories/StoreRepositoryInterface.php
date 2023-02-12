<?php

namespace App\Interfaces\Repositories;

interface StoreRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findManyByUserId(object $payload, string $sortField, string $sortOrder, int $userId);
    public function findOneByStoreUrl(string $storeUrl);
    public function findOneById(int $storeId);
    public function create(object $payload, object $template);
    public function update(object $payload, int $storeId);
    public function updateStoreTemplate(int $storeId);
    public function findManyCount();
}
