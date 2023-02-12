<?php

namespace App\Interfaces\Repositories;

interface StoreCategoryRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findManyWithNoPagination();
    public function create(object $payload);
    public function findOneById(int $storeCategoryId);
    public function findOneByName(string $storeCategory);
    public function update(object $payload, int $storeCategoryId);
    public function updateImage(object $payload, int $storeCategoryId);
    public function updateLogo(object $payload, int $storeCategoryId);
}
