<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::create([
            'name' => 'General',
            'created_at' => Carbon::now()
        ]);
    }
}
