<?php

namespace App\Interfaces\Repositories;

interface SalesRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findOneById(int $orderId);
    public function updateStatus(object $payload, int $orderId);
    public function findOneByProductId(object $payload, string $sortField, string $sortOrder, int $productId);
    public function findManyUserSales(object $payload, string $sortField, string $sortOrder);
    public function findManyMonthlySales();
}
