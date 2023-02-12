<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'id' => '1',
                'name' => 'Marketeer',
                'key' => 'Affiliate',
                'commission' => 0.10,
                'created_at' => Carbon::now()
            ],
            [
                'id' => '2',
                'name' => 'Partner Plan 200',
                'key' => 'Partner 200',
                'commission' => 0.15,
                'created_at' => Carbon::now()
            ],
            [
                'id' => '3',
                'name' => 'Partner Plan 500',
                'key' => 'Partner 500',
                'commission' => 0.15,
                'created_at' => Carbon::now()
            ],
            [
                'id' => '4',
                'name' => 'Partner Plan 1,200',
                'key' => 'Partner 1,200',
                'commission' => 0.20,
                'created_at' => Carbon::now()
            ],
            [
                'id' => '5',
                'name' => 'Partner Plan 2,500',
                'key' => 'Partner 2,500',
                'commission' => 0.20,
                'created_at' => Carbon::now()
            ],
            [
                'id' => '6',
                'name' => 'Partner Plan 5,000',
                'key' => 'Partner 5,000',
                'commission' => 0.25,
                'created_at' => Carbon::now()
            ],
            [
                'id' => '7',
                'name' => 'Partner Plan 10,000',
                'key' => 'Partner 10,000',
                'commission' => 0.25,
                'created_at' => Carbon::now()
            ],
            [
                'id' => '8',
                'name' => 'Partner Plan 25,000',
                'key' => 'Partner 25,000',
                'commission' => 0.30,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
