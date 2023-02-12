<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CartRepositoryInterface;
use App\Models\Cart;

class CartRepository implements CartRepositoryInterface
{
    public function findMany($sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return Cart::with([
            'product',
            'product.medias'
        ])->where('customer_id', $userId)->orderBy($sortField, $sortOrder)->get();
    }

    public function create($payload)
    {
        $userId = auth()->user()->id;
        $productId = $payload->product_id;

        $cart = Cart::where('product_id', $productId)->where('customer_id', $userId)->first();

        if ($cart) {
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
            return $cart->fresh();
        } else {
            $cart = new Cart();
            $cart->customer_id = $userId;
            $cart->product_id = $payload->product_id;
            $cart->quantity = $payload->quantity;
            $cart->save();
            return $cart->fresh();
        }
    }

    public function findOneById($cartId)
    {
        return Cart::with([
            'product',
            'product.medias'
        ])->findOrFail($cartId);
    }

    public function update($payload, $cartItemId)
    {
        $userId  = auth()->user()->id;
        $cart = Cart::where('id', $cartItemId)->where('customer_id', $userId)->first();
        $cart->quantity = $payload->quantity;
        $cart->save();
        return $cart->fresh();
    }

    public function deleteOneById($cartItemId)
    {
        $userId = auth()->user()->id;
        $cart = Cart::where('id', $cartItemId)->where('customer_id', $userId)->first();
        $cart->delete();

        return $cart->fresh();
    }

    public function deleteManyByCustomerId($customerId)
    {
        return Cart::where('customer_id', $customerId)->delete();
    }

    public function syncGuestCartItems($productId, $quantity)
    {
        $userId = auth()->user()->id;

        $cart = Cart::where('product_id', $productId)->where('customer_id', $userId)->first();

        if ($cart) {
            $cart->quantity = $cart->quantity + $quantity;
            $cart->save();
            return $cart->fresh();
        } else {
            $cart = new Cart();
            $cart->customer_id = $userId;
            $cart->product_id = $productId;
            $cart->quantity = $quantity;
            $cart->save();
            return $cart->fresh();
        }
    }
}
