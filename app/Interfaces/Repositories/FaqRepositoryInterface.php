<?php

namespace App\Interfaces\Repositories;

interface FaqRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findOneById(int $faqId);
    public function findOneByCategoryId(int $categoryId);
    public function create(object $payload);
    public function update(object $payload, int $faqId);
    public function delete(int $faqId);
}
