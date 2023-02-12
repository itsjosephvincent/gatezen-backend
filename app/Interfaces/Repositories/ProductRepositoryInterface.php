<?php

namespace App\Interfaces\Repositories;

interface ProductRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findManyByStore(object $payload, object $categoryProducts,  int $storeCategoryId, string $sortField, string $sortOrder);
    public function findOneById(int $productId);
    public function findOneBySlug(string $slug);
    public function create(object $payload);
    public function update(object $payload, int $productId);
    public function getAllProductCount();
}
