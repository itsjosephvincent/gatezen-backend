<?php

namespace App\Interfaces\Repositories;

interface NewsRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findOne(int $newsId);
    public function create(object $payload);
    public function upload(string $img_url, int $newsId);
    public function update(object $payload, int $newsId);
    public function delete(int $newsId);
}
