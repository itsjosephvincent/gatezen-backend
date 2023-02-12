<?php

namespace App\Interfaces\Repositories;

interface ProductMediaRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder, int $productId);
    public function create(object $payload);
    public function findOneById(int $mediaId);
    public function update(object $payload, int $mediaId);
    public function delete(int $mediaId);
}
