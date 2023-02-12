<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayoutStoreRequest;
use App\Http\Requests\UserPayoutUpdateRequest;
use App\Interfaces\Services\PayoutServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PayoutController extends Controller
{
    private $payoutService;

    public function __construct(PayoutServiceInterface $payoutService)
    {
        $this->payoutService = $payoutService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->payoutService->findPayoutsByStoreOwner($request)->response();
    }

    public function store(PayoutStoreRequest $request): JsonResponse
    {
        return $this->payoutService->createPayout($request->user_bank_details_id)->response();
    }

    public function show($payoutId)
    {
        return $this->payoutService->findPayout($payoutId)->response();
    }

    public function update(UserPayoutUpdateRequest $request, $payoutId): JsonResponse
    {
        $payload = (object) $request->only([
            'account_number',
            'account_name',
            'bank_name',
            'bank_swift_code'
        ]);

        return $this->payoutService->updateStoreOwnerPayout($payload, $payoutId)->response();
    }

    public function destroy($id)
    {
        //
    }
}
