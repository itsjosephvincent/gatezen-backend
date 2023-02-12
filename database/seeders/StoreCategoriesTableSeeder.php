<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StoreCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_categories')->insert([
            [
                'name' => 'Mbraced.by',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/bracelets/bracelets.png',
                'description' => 'Stylish Bracelets by Mbraced',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Coffee Lab Stories',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/coffee/coffee.png',
                'description' => 'Coffee Lab Stories',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Furniture',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/furniture/furniture.png',
                'description' => 'Timeless designer furniture',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Saint Rochés Sunglasses',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/saint-roches-template/sunglasses.png',
                'description' => 'Available Now',
                'status' => 'available_now',
                'logo_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/logo/saint-roches/saint-roches-logo-black.png',
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Hauger Watches',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/hauger-template/haugerwatches.png',
                'description' => 'Hauger Timepieces',
                'status' => 'available_now',
                'logo_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/logo/hauger/hauger-timeless-craftsmanship-logo-black_new.png',
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Casualwear Store',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/casual-wear/casualware.png',
                'description' => 'Casual clothing for Him and Her',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Sanitizers Store Base',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/sanitizers/sanitizers.png',
                'description' => 'Sanitizers and antibacterials for all occations',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Tyre Store',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/tyres/tyres.png',
                'description' => 'All kinds of vehicle tyres',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Women\'s Make Up',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/beauty-makeup/beautymakeup.png',
                'description' => 'Make up and other beauty products',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Gatezen CBD',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/cbd-template/cbd.png',
                'description' => 'Approved CBD Oils',
                'status' => 'pre_launch',
                'logo_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/logo/cbd/gatezen-natural.png',
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Hair Products',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/hair-products/hairproducts.png',
                'description' => 'Satisfies the hair and skin',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Jewelry',
                'img_url' => 'https://gatezen.s3.eu-central-1.amazonaws.com/jewelry/jewelerly.png',
                'description' => 'Necklaces, rings, earrings  and more',
                'status' => 'coming_soon',
                'logo_url' => NULL,
                'order_notification_emails' => NULL,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
