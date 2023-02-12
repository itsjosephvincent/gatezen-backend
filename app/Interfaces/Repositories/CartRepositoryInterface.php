<?php

namespace App\Interfaces\Repositories;

interface CartRepositoryInterface
{
    public function findMany(string $sortField, string $sortOrder);
    public function create(object $payload);
    public function findOneById(int $cartId);
    public function update(object $payload, int $cartItemId);
    public function deleteOneById(int $cartItemId);
    public function deleteManyByCustomerId(int $customerId);
    public function syncGuestCartItems(int $productId, int $quantity);
}
