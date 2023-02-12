<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartUpdateRequest;
use App\Interfaces\Services\CartServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Store $store)
    {
        return $this->cartService->findCarts($store);
    }

    public function store(CartRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'product_id',
            'quantity'
        ]);

        return $this->cartService->createCart($payload)->response();
    }

    public function show($cartItemId): JsonResponse
    {
        return $this->cartService->findCart($cartItemId)->response();
    }

    public function update(CartUpdateRequest $request, $cartItemId): JsonResponse
    {
        $payload = (object) $request->only([
            'quantity'
        ]);

        return $this->cartService->updateCart($payload, $cartItemId)->response();
    }

    public function destroy($cartItemId, Store $store): JsonResponse
    {
        return $this->cartService->deleteCart($cartItemId, $store)->response();
    }

    public function syncItems(Request $request)
    {
        return $this->cartService->syncGuestItemsToCart($request);
    }
}
