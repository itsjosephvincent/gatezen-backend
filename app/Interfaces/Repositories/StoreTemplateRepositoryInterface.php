<?php

namespace App\Interfaces\Repositories;

interface StoreTemplateRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findOneById(int $storeTemplateId);
    public function create(object $payload);
    public function update(object $payload, int $storeTemplateId);
    public function updatePhoto(object $payload, int $storeTemplateId);
    public function findOneByStoreId(int $storeId);
    public function findOneByStoreCategoryId(int $storeCategoryId);
}
