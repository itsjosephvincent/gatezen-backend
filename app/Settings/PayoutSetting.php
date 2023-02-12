<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PayoutSetting extends Settings
{
    public string $min_payout_amount;

    public static function group(): string
    {
        return 'payout';
    }
}
