<?php

namespace Database\Seeders;

use App\Models\StoreCategory;
use Illuminate\Database\Seeder;
use App\Models\Template;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('templates')->insert([
            [
                'store_category_id' => 4, //Saint Rochés Sunglasses
                'name' => 'SR-2023-01',
                'description' => $faker->sentence(),
                'repo_url' => 'git@gitlab.abovestratus.com:gate-zen-templates/template-test.git',
                'version' => $faker->randomElement(['1.0', '1.1', '1.2']),
                'image_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/saint-roches-template/sunglasses.png',
                'port'=>5688,
                'created_at' => Carbon::now()
            ],
            [
                'store_category_id' => 5, //Hauger Watches
                'name' => 'HW-2023-01',
                'description' => $faker->sentence(),
                'repo_url' => 'git@gitlab.abovestratus.com:gate-zen-templates/template-test.git',
                'version' => $faker->randomElement(['1.0', '1.1', '1.2']),
                'image_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/hauger-template/haugerwatches.png',
                'port'=>5689,
                'created_at' => Carbon::now()
            ],
            [
                'store_category_id' => 10, //Gatezen CBD
                'name' => 'CBD-2023-01',
                'description' => $faker->sentence(),
                'repo_url' => 'git@gitlab.abovestratus.com:gate-zen-templates/template-test.git',
                'version' => $faker->randomElement(['1.0', '1.1', '1.2']),
                'image_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/cbd-template/cbd.png',
                'port'=>5690,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
