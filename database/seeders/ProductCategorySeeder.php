<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'CBD OIL',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'CBG OIL',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'MAGIC PAIR',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'CBD FOR PETS',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'CBD VAPES',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'CBD TEA',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'CBD CREAM',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BUNDLE & SAVE',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'THC FREE',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Women',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Men',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Women's Watches",
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Men's Watches",
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Spring Collection',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Superior Leather Collection',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Delicate Stone Collection',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Endurance Steel Collection',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Durable String Collection',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'WHOLE BEANS',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'GROUND COFFEE',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'BUNDLES',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Featured',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Best Seller',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'New Arrival',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Inspiration',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Relief',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Focus',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Relaxation',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Sleep',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Health',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
