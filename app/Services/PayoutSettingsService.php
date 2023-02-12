<?php

namespace App\Services;

use App\Http\Resources\PayoutSettingsResource;
use App\Interfaces\Repositories\PayoutSettingsRepositoryInterface;
use App\Interfaces\Services\PayoutSettingsServiceInterface;
use App\Settings\PayoutSetting;

class PayoutSettingsService implements PayoutSettingsServiceInterface
{
    private $payoutSettingsRepository;

    public function __construct(PayoutSettingsRepositoryInterface $payoutSettingsRepository)
    {
        $this->payoutSettingsRepository = $payoutSettingsRepository;
    }

    public function findMinPayoutValue()
    {
        $value = $this->payoutSettingsRepository->findMinimumPayout();

        $data = (object) [
            'min_amount' => $value
        ];

        return new PayoutSettingsResource($data);
    }

    public function updateMinPayoutValue($amount)
    {
        $value = $this->payoutSettingsRepository->updateMinimumPayout($amount);

        $data = (object) [
            'min_amount' => $value
        ];

        return new PayoutSettingsResource($data);
    }
}
