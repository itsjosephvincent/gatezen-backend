<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_zones')->insert([
            [
                'store_category_id' => 4, //Saint Roches
                'countries' => json_encode(array(
                    'Austria',
                    'Belgium',
                    'Bulgaria',
                    'Croatia',
                    'Cyprus',
                    'Czech Republic',
                    'Denmark',
                    'Finland',
                    'France',
                    'Germany',
                    'Greece',
                    'Hungary',
                    'Ireland',
                    'Italy',
                    'Latvia',
                    'Lithuania',
                    'Luxemburg',
                    'Malta',
                    'Netherlands',
                    'Norway',
                    'Poland',
                    'Portugal',
                    'Romania',
                    'Slovenia',
                    'Spain',
                    'Sweden'
                )),
                'created_at' => Carbon::now()
            ],
            [
                'store_category_id' => 10, //CBD
                'countries' => json_encode(array(
                    'Bulgaria',
                    'Czech Republic',
                    'Denmark',
                    'Finland',
                    'France',
                    'Germany',
                    'Italy',
                    'Netherlands',
                    'Norway',
                    'Poland',
                    'Portugal',
                    'Romania',
                    'Spain',
                    'Sweden',
                    'United Kingdom'
                )),
                'created_at' => Carbon::now()
            ],
            [
                'store_category_id' => 5, //Hauger
                'countries' => json_encode(array(
                    'Austria',
                    'Belgium',
                    'Bulgaria',
                    'Croatia',
                    'Cyprus',
                    'Czech Republic',
                    'Denmark',
                    'Finland',
                    'France',
                    'Germany',
                    'Greece',
                    'Hungary',
                    'Ireland',
                    'Italy',
                    'Latvia',
                    'Lithuania',
                    'Luxemburg',
                    'Malta',
                    'Netherlands',
                    'Norway',
                    'Poland',
                    'Portugal',
                    'Romania',
                    'Slovenia',
                    'Spain',
                    'Sweden'
                )),
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
