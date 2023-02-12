<?php

namespace App\Interfaces\Repositories;

use App\Settings\PayoutSetting;

interface PayoutSettingsRepositoryInterface
{
    public function findMinimumPayout();
    public function updateMinimumPayout($amount);
}
