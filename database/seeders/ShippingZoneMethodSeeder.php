<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingZoneMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_zone_methods')->insert([
            [
                'shipping_zone_id' => 1, // Saint Roches
                'shipping_method_id' => 1, //Flat Rate
                'created_at' => Carbon::now()
            ],
            [
                'shipping_zone_id' => 1, // Saint Roches
                'shipping_method_id' => 2, // Free Shipping - Min Order 200
                'created_at' => Carbon::now()
            ],
            [
                'shipping_zone_id' => 2, // CBD
                'shipping_method_id' => 1, //Flat Rate
                'created_at' => Carbon::now()
            ],
            [
                'shipping_zone_id' => 2, // CBD
                'shipping_method_id' => 3, // Free Shipping - Min Order 150
                'created_at' => Carbon::now()
            ],
            [
                'shipping_zone_id' => 3, //Hauger
                'shipping_method_id' => 4, // Free Shipping
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
