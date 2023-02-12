<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqCategory::create([
            'name' => 'General',
            'created_at' => Carbon::now()
        ]);
    }
}
