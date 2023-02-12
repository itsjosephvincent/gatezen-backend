<?php

namespace App\Interfaces\Services;

use App\Settings\PayoutSetting;

interface PayoutSettingsServiceInterface
{
    public function findMinPayoutValue();
    public function updateMinPayoutValue($amount);
}
