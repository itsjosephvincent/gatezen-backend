<?php

namespace Database\Seeders;

use App\Models\PayoutSetting;
use Illuminate\Database\Seeder;

class PayoutSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayoutSetting::create([
            'min_payout_amount' => 200.00
        ]);
    }
}
