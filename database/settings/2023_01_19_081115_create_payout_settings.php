<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreatePayoutSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('payout.min_payout_amount', '200.00');
    }
}
