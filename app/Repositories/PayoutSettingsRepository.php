<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PayoutSettingsRepositoryInterface;
use App\Settings\PayoutSetting;

class PayoutSettingsRepository implements PayoutSettingsRepositoryInterface
{
    private $payoutSetting;

    public function __construct()
    {
        $this->payoutSetting = new PayoutSetting();
    }

    public function findMinimumPayout()
    {
        return $this->payoutSetting->min_payout_amount;
    }

    public function updateMinimumPayout($amount)
    {
        $this->payoutSetting->min_payout_amount = $amount;
        $this->payoutSetting->save();

        return $this->payoutSetting->min_payout_amount;
    }
}
