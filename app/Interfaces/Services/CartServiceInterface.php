<?php

namespace App\Interfaces\Services;

use App\Models\Store;

interface CartServiceInterface
{
    public function findCarts(Store $store);
    public function createCart(object $payload);
    public function findCart(int $cartItemId);
    public function updateCart(object $payload, int $cartItemId);
    public function deleteCart(int $cartItemId, Store $store);
    public function syncGuestItemsToCart(object $payload);
}
