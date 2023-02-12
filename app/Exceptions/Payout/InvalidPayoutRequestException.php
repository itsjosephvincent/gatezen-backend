<?php

namespace App\Exceptions\Payout;

use App\Exceptions\ApplicationException;
use App\Interfaces\Repositories\PayoutSettingsRepositoryInterface;
use App\Interfaces\Services\PayoutSettingsServiceInterface;
use App\Models\PayoutSetting;
use App\Repositories\PayoutSettingsRepository;
use App\Services\PayoutSettingsService;
use Illuminate\Http\Response;

class InvalidPayoutRequestException extends ApplicationException
{
    private $payoutSettingService;

    public function __construct()
    {
        $this->payoutSettingService = new PayoutSettingsRepository();
    }

    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public function error(): string
    {
        $minPayout = $this->payoutSettingService->findMinimumPayout();

        $replacement = [
            'min_payout' => $minPayout
        ];

        return trans('exception.invalid_payout_request.message', $replacement);
    }
}
