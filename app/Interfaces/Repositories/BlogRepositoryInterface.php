<?php

namespace App\Interfaces\Repositories;

interface BlogRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findManyByStoreCategory(object $payload, int $storeCategoryId, string $sortField, string $sortOrder);
    public function findOneById(int $blogId);
    public function findOneBySlug(string $blogSlug);
    public function create(object $payload);
    public function update(object $payload, int $blogId);
    public function updatePhoto(object $payload, int $blogId);
    public function delete(int $blogId);
}
