<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsHeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('news_headlines')->insert([
            [
                'news_category_id' => 1, //The GATE Relations
                'title' => 'Join GATE Zen',
                'description' => "E-commerce opportunities
                
                On GATE Zen we have awesome top-selling brands available for you to:
                    
                - Become a Marketeer with and to make money from
                - Saint Roches Sunglasses, Hauger Watches and CBD Products are ready!
                
                GATE Zen is a company that produces, imports and sells its own and other's brands, mainly
                to the European Market. We believe that quality in each individual section ensures that all our
                customers have the necessary confidence to do business with us.
                
                In GATE Zen we make a wide range of our product lines available to you via our Ship2Go
                solution - by making an effort as a social marketeer and selling these products, everyone can
                make money.
                
                Videos coming soon on how to join the Club!",
                'created_at' => Carbon::now()
            ],
            [
                'news_category_id' => 1, //The GATE Relations
                'title' => 'Aqua H2O Water Technologies PLC',
                'description' => $faker->paragraph(),
                'created_at' => Carbon::now()
            ],
            [
                'news_category_id' => 1, //The GATE Relations
                'title' => 'Volver Zen & Gate Zen Connection',
                'description' => $faker->paragraph(),
                'created_at' => Carbon::now()
            ],
            [
                'news_category_id' => 1, //The GATE Relations
                'title' => 'The future of Business Evolution',
                'description' => $faker->paragraph(),
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
