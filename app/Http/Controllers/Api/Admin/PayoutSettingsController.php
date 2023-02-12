<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayoutMinimumValueUpdateRequest;
use App\Interfaces\Services\PayoutSettingsServiceInterface;
use Illuminate\Http\JsonResponse;

class PayoutSettingsController extends Controller
{
    private $payoutSettingsService;

    public function __construct(PayoutSettingsServiceInterface $payoutSettingsService)
    {
        $this->payoutSettingsService = $payoutSettingsService;
    }

    public function index()
    {
        return $this->payoutSettingsService->findMinPayoutValue();
    }

    public function update(PayoutMinimumValueUpdateRequest $request): JsonResponse
    {
        return $this->payoutSettingsService->updateMinPayoutValue($request->min_payout_amount)->response();
    }
}
