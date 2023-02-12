<?php

namespace Database\Seeders;

use App\Enum\ShippingMethodKey;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_methods')->insert([
            [
                'key' => ShippingMethodKey::FlatRate->value,
                'name' => 'Track & Trace (3-5 days)',
                'min_order_amount' => 0,
                'shipping_fee' => 9.95,
                'created_at' => Carbon::now()
            ],
            [
                'key' => ShippingMethodKey::Free->value,
                'name' => 'Free Shipping',
                'min_order_amount' => 200.00,
                'shipping_fee' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'key' => ShippingMethodKey::Free->value,
                'name' => 'Free Shipping',
                'min_order_amount' => 150.00,
                'shipping_fee' => 0,
                'created_at' => Carbon::now()
            ],
            [
                'key' => ShippingMethodKey::Free->value,
                'name' => 'Free Shipping',
                'min_order_amount' => 0,
                'shipping_fee' => 0,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
