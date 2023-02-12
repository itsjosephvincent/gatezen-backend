<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayoutStoreInternalNotesRequest;
use App\Http\Requests\PayoutUpdateRequest;
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
        return $this->payoutService->findPayouts($request)->response();
    }

    public function show($payoutId): JsonResponse
    {
        return $this->payoutService->findPayout($payoutId)->response();
    }

    public function updateInternalNotes(PayoutStoreInternalNotesRequest $request, $payoutId): JsonResponse
    {
        $payload = (object) $request->only([
            'internal_note'
        ]);

        return $this->payoutService->updatePayoutInternalNote($payload, $payoutId)->response();
    }

    public function update(PayoutUpdateRequest $request, $payoutId): JsonResponse
    {
        $payload = (object) $request->only([
            'payout_status',
        ]);

        return $this->payoutService->updatePayoutStatus($payload, $payoutId)->response();
    }
}
