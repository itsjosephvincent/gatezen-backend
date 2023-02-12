<?php

namespace App\Interfaces\Services;

interface StoreCategoryServiceInterface
{
    public function findStoreCategories(object $payload);
    public function findStoreCategoriesNoPagination();
    public function createStoreCategory(object $payload);
    public function findStoreCategory(int $storeCategoryId);
    public function updateStoreCategory(object $payload, int $storeCategoryId);
    public function updateStoreCategoryImage(object $payload, int $storeCategoryId);
    public function updateStoreCategoryLogo(object $payload, int $storeCategoryId);
}
