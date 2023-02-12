<?php

namespace Database\Seeders;

use App\Models\ProductMedia;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gateZenNaturalProductsMedias = [
            // CBD Oil
            [
                'product_id' => 1,
                'name' => 'Black Label CBD Extra Virgin Organic Olive Oil 30%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-oil_black_label-300mg.png',
            ],
            [
                'product_id' => 2,
                'name' => 'CBD Oil Broad Spectrum 10%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_1000mg-600x600.png',
            ],
            [
                'product_id' => 3,
                'name' => 'CBD Oil Broad Spectrum 15%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_1500mg-600x600.png',
            ],
            [
                'product_id' => 4,
                'name' => 'CBD Oil Broad Spectrum 20%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_2000mg-600x600.png',
            ],
            [
                'product_id' => 5,
                'name' => 'CBD Oil Broad Spectrum 25%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_2500mg-600x600.png',
            ],
            [
                'product_id' => 6,
                'name' => 'CBD Oil Broad Spectrum 3%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_300mg-600x600.png',
            ],
            [
                'product_id' => 7,
                'name' => 'CBD Oil Broad Spectrum 30%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_3000mg-600x600.png',
            ],
            [
                'product_id' => 8,
                'name' => 'CBD Oil Broad Spectrum 40%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_4000mg-600x600.png',
            ],
            [
                'product_id' => 9,
                'name' => 'CBD Oil Broad Spectrum 5%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_500mg-600x600.png',
            ],
            [
                'product_id' => 10,
                'name' => 'CBD Oil Broad Spectrum 50%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_broad_spectrum_5000mg.png',
            ],
            [
                'product_id' => 11,
                'name' => 'CBD Oil Full Spectrum 10%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_1000mg-600x600.png',
            ],
            [
                'product_id' => 12,
                'name' => 'CBD Oil Full Spectrum 15%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_1500mg-600x600.png',
            ],
            [
                'product_id' => 13,
                'name' => 'CBD Oil Full Spectrum 20%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_2000mg-600x600.png',
            ],
            [
                'product_id' => 14,
                'name' => 'CBD Oil Full Spectrum 25%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_2500mg-600x600.png',
            ],
            [
                'product_id' => 15,
                'name' => 'CBD Oil Full Spectrum 3%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_300mg-600x600.png',
            ],
            [
                'product_id' => 16,
                'name' => 'CBD Oil Full Spectrum 30%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_3000mg-600x600.png',
            ],
            [
                'product_id' => 17,
                'name' => 'CBD Oil Full Spectrum 40%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_4000mg-600x600.png',
            ],
            [
                'product_id' => 18,
                'name' => 'CBD Oil Full Spectrum 5%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_500mg-600x600.png',
            ],
            [
                'product_id' => 19,
                'name' => 'CBD Oil Full Spectrum 50%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/oil_full_spectrum_5000mg-600x600.png',
            ],
            [
                'product_id' => 20,
                'name' => 'CBD Starter Set',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-starter-kit-600x600.png',
            ],
            // CBG Oil
            [
                'product_id' => 21,
                'name' => 'CBG Oil Broad Spectrum 10%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_1000mg-600x600.png',
            ],
            [
                'product_id' => 22,
                'name' => 'CBG Oil Broad Spectrum 15%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_1500mg-600x600.png',
            ],
            [
                'product_id' => 23,
                'name' => 'CBG Oil Broad Spectrum 20%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_2000mg.png',
            ],
            [
                'product_id' => 24,
                'name' => 'CBG Oil Broad Spectrum 25%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_2500mg-copy-600x600.png',
            ],
            [
                'product_id' => 25,
                'name' => 'CBG Oil Broad Spectrum 30%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_3000mg-600x600.png',
            ],
            [
                'product_id' => 26,
                'name' => 'CBG Oil Broad Spectrum 40%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_4000mg-600x600.png',
            ],
            [
                'product_id' => 27,
                'name' => 'CBG Oil Broad Spectrum 5%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_500mg.png',
            ],
            [
                'product_id' => 28,
                'name' => 'CBG Oil Broad Spectrum 50%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_broad_spectrum_5000mg-600x600.png',
            ],
            [
                'product_id' => 29,
                'name' => 'CBG Oil Full Spectrum 10%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_1000mg-600x600.png',
            ],
            [
                'product_id' => 30,
                'name' => 'CBG Oil Full Spectrum 15%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_1500mg-600x600.png',
            ],
            [
                'product_id' => 31,
                'name' => 'CBG Oil Full Spectrum 20%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_2000mg-600x600.png',
            ],
            [
                'product_id' => 32,
                'name' => 'CBG Oil Full Spectrum 25%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_2500mg.png',
            ],
            [
                'product_id' => 33,
                'name' => 'CBG Oil Full Spectrum 30%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_3000mg-600x600.png',
            ],
            [
                'product_id' => 34,
                'name' => 'CBG Oil Full Spectrum 40%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_4000mg-600x600.png',
            ],
            [
                'product_id' => 35,
                'name' => 'CBG Oil Full Spectrum 5%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_500mg-600x600.png',
            ],
            [
                'product_id' => 36,
                'name' => 'CBG Oil Full Spectrum 50%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-oil_full_spectrum_5000mg-600x600.png',
            ],
            // Magic Pair
            [
                'product_id' => 37,
                'name' => 'CBD+CBG Oil Broad Spectrum 10%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/magic-pair-oil_broad_spectrum_1000mg-600x600.png',
            ],
            [
                'product_id' => 38,
                'name' => 'CBD+CBG Oil Broad Spectrum 20%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/magic-pair-oil_broad_spectrum_2000mg-600x600.png',
            ],
            [
                'product_id' => 39,
                'name' => 'CBD+CBG Oil Broad Spectrum 30%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/magic-pair-oil_broad_spectrum_3000mg-600x600.png',
            ],
            [
                'product_id' => 40,
                'name' => 'CBD+CBG Oil Full Spectrum 10%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/magic-pair-oil_full_spectrum_1000mg-600x600.png',
            ],
            [
                'product_id' => 41,
                'name' => 'CBD+CBG Oil Full Spectrum 20%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/magic-pair-oil_full_spectrum_2000mg-600x600.png',
            ],
            [
                'product_id' => 42,
                'name' => 'CBD+CBG Oil Full Spectrum 30%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/magic-pair-oil_full_spectrum_3000mg-600x600.png',
            ],
            [
                'product_id' => 43,
                'name' => 'CBD+CBG Pet Oil Broad Spectrum 3%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/magic-pair-oil_for_pets_300mg-600x600.png',
            ],
            // CBD for Pets
            [
                'product_id' => 44,
                'name' => 'CBD Oil For Pets Broad Spectrum 3%',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/pet-oil_broad_spectrum_300mg-600x600.png',
            ],
            // CBD Vapes
            [
                'product_id' => 45,
                'name' => 'CBD Vape Kush 10% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_ogkush_1000mg_5ml-1-600x600.png',
            ],
            [
                'product_id' => 46,
                'name' => 'CBD Vape Kush 10% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_ogkush_1000mg_10ml-600x600.png',
            ],
            [
                'product_id' => 47,
                'name' => 'CBD Vape Kush 5% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_ogkush_500mg_5ml-1.png',
            ],
            [
                'product_id' => 48,
                'name' => 'CBD Vape Kush 5% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_ogkush_500mg_10ml-1.png',
            ],
            [
                'product_id' => 49,
                'name' => 'CBD Vape Lemon Haze 10% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_lemonhaze_1000mg_5ml-1-600x600.png',
            ],
            [
                'product_id' => 50,
                'name' => 'CBD Vape Lemon Haze 10% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_lemonhaze_1000mg_10ml-1-600x600.png',
            ],
            [
                'product_id' => 51,
                'name' => 'CBD Vape Lemon Haze 5% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_lemonhaze_500mg_5ml-1-600x600.png',
            ],
            [
                'product_id' => 52,
                'name' => 'CBD Vape Lemon Haze 5% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_lemonhaze_500mg_10ml-1-600x600.png',
            ],
            [
                'product_id' => 53,
                'name' => 'CBD Vape Strawberry 10% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_strawberry_1000mg_5ml_1-600x600.png',
            ],
            [
                'product_id' => 54,
                'name' => 'CBD Vape Strawberry 10% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_strawberry_1000mg_10ml_1-600x600.png',
            ],
            [
                'product_id' => 55,
                'name' => 'CBD Vape Strawberry 5% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_strawberry_500mg_5ml_1-600x600.png',
            ],
            [
                'product_id' => 56,
                'name' => 'CBD Vape Strawberry 5% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_strawberry_500mg_10ml_1-600x600.png',
            ],
            [
                'product_id' => 57,
                'name' => 'CBD Vape Watermelon 10% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_watermelon_1000mg_5ml_1-600x600.png',
            ],
            [
                'product_id' => 58,
                'name' => 'CBD Vape Watermelon 10% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_watermelon_1000mg_10ml_1-600x600.png',
            ],
            [
                'product_id' => 59,
                'name' => 'CBD Vape Watermelon 5% (5ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_watermelon_500mg_5ml_1-600x600.png',
            ],
            [
                'product_id' => 60,
                'name' => 'CBD Vape Watermelon 5% (10ml)',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/eliquid_watermelon_500mg_10ml_1-600x600.png',
            ],
            // // CBD Tea
            // [
            //     'product_id' => 61,
            //     'name' => 'CBD Premium Tea 5%',
            //     'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-tea-5-1-600x600.png',
            // ],
            // [
            //     'product_id' => 62,
            //     'name' => 'CBD Premium Tea 6%',
            //     'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-tea-6-1-600x600.png',
            // ],
            // [
            //     'product_id' => 63,
            //     'name' => 'CBD Premium Tea 7%',
            //     'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbg-tea-7-1-600x600.png',
            // ],
            // CBD Cream
            [
                'product_id' => 61,
                'name' => 'CBD Analgesic Cream 620mg',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd_cream_analgesic-600x600.png',
            ],
            [
                'product_id' => 62,
                'name' => 'CBD Skin Care Cream 620mg',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd_cream_skin-600x600.png',
            ],
            // Bundle Set
            [
                'product_id' => 63,
                'name' => 'CBD Casual Set',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-casual-kit-600x600.png',
            ],
            [
                'product_id' => 64,
                'name' => 'CBD Expert Set',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-expert-kit-600x600.png',
            ],
            [
                'product_id' => 65,
                'name' => 'CBD Relaxation Set',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-relaxation-kit-600x600.png',
            ],
            [
                'product_id' => 66,
                'name' => 'CBD SkinCare Set',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-skincare-kit-600x600.png',
            ],
            [
                'product_id' => 67,
                'name' => 'CBD Sports Set',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-sports-kit.png',
            ],
            [
                'product_id' => 68,
                'name' => 'CBD Wellness Set',
                'media_url' => 'https://gatezencbd.com/wp-content/uploads/2022/08/cbd-wellness-kit-1-600x600.png',
            ],
        ];

        foreach ($gateZenNaturalProductsMedias as $gateZenNaturalProductMedia) {
            ProductMedia::updateOrCreate([
                'product_id' => $gateZenNaturalProductMedia['product_id'],
            ], [
                'product_id' => $gateZenNaturalProductMedia['product_id'],
                'name' => $gateZenNaturalProductMedia['name'],
                'media_url' => $gateZenNaturalProductMedia['media_url'],
                'is_featured' => 1,
                'created_at' => Carbon::now()
            ]);
        }

        $saintRochersProductMedias = [
            [
                'product_id' => 69,
                'name' => 'Adam Traveller Sunglasses Shiny Gold/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/adam-traveller-brown-1.jpg'
            ],
            [
                'product_id' => 70,
                'name' => 'Adam Traveller Sunglasses Shiny Silver/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/adam-traveller-smoke-1.jpg'
            ],
            [
                'product_id' => 71,
                'name' => 'Benjamin Inspector Sunglasses Black/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/benjamin-inspector-black-1-copy.jpg'
            ],
            [
                'product_id' => 72,
                'name' => 'Benjamin Inspector Sunglasses Turtle Brown/Solid Green',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/benjamin-inspector-turtle-1-copy.jpg'
            ],
            [
                'product_id' => 73,
                'name' => 'Celine Explorer Sunglasses Crystal Brown/Shiny Gold',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/celine-explorer-2-copy.jpg'
            ],
            [
                'product_id' => 74,
                'name' => 'Charles Pilot Sunglasses Shiny Gold/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/charles-pilot-brown-1-copy.jpg'
            ],
            [
                'product_id' => 75,
                'name' => 'Charles Pilot Sunglasses Shiny Gold/Light Yellow',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/charles-pilot-yellow-1-copy.jpg'
            ],
            [
                'product_id' => 76,
                'name' => 'Charles Pilot Sunglasses Rose Gold/Rose Gold Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/charles-pilot-pink-1-copy.jpg'
            ],
            [
                'product_id' => 77,
                'name' => 'Charles Pilot Sunglasses Shiny Silver/Heavy Mirror',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/charles-pilot-mirror-1-copy.jpg'
            ],
            [
                'product_id' => 78,
                'name' => 'Charles Pilot Sunglasses Shiny Silver/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/charles-pilot-dark-1-copy.jpg'
            ],
            [
                'product_id' => 79,
                'name' => 'Damien Pilot Sunglasses Shiny Gold/Light Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/damien-pilot-light-1-copy.jpg'
            ],
            [
                'product_id' => 80,
                'name' => 'Damien Pilot Sunglasses Shiny Gold/Green Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/damien-pilot-dark-1-copy.jpg'
            ],
            [
                'product_id' => 81,
                'name' => 'Damien Pilot Sunglasses Shiny Silver/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/damien-pilot-silver-1-copy.jpg'
            ],
            [
                'product_id' => 82,
                'name' => 'Coline Fashionista Sunglasses Black/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/coline-fashionista-black-1-copy.jpg'
            ],
            [
                'product_id' => 83,
                'name' => 'Coline Fashionista Sunglasses Crystal Brown/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/coline-fashionista-crystal-brown-1-copy.jpg'
            ],
            [
                'product_id' => 84,
                'name' => 'David Defender Sunglasses Black/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/david-defender-black-1-copy.jpg'
            ],
            [
                'product_id' => 85,
                'name' => 'David Defender Sunglasses Turtle Brown/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/david-defender-brown-1-copy.jpg'
            ],
            [
                'product_id' => 86,
                'name' => 'David Defender Sunglasses White/Mirror',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/david-defender-white-1-copy.jpg'
            ],
            [
                'product_id' => 87,
                'name' => 'Dorian Explorer Sunglasses Shiny Gold/Solid Green',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/dorian-explorer-green-1-copy.jpg'
            ],
            [
                'product_id' => 88,
                'name' => 'Dorian Explorer Sunglasses Shiny Gold/Light Yellow',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/dorian-explorer-yellow-1-copy.jpg'
            ],
            [
                'product_id' => 89,
                'name' => 'Dorian Explorer Sunglasses Shiny Silver/Smoke Mirror',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/dorian-explorer-mirror-1-copy.jpg'
            ],
            [
                'product_id' => 90,
                'name' => 'Estelle Explorer Sunglasses Turtle Brown/Shiny Gold',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/estelle-explorer-turtle-1-1.jpg'
            ],
            [
                'product_id' => 91,
                'name' => 'Estelle Explorer Sunglasses Crystal Brown/Shiny Gold',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/estelle-explorer-pink-2-copy.jpg'
            ],
            [
                'product_id' => 92,
                'name' => 'Gabriel Defender Sunglasses Shiny Gold/Green Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/gabriel-defender-green-1-copy.jpg'
            ],
            [
                'product_id' => 93,
                'name' => 'Gabriel Defender Sunglasses Shiny Silver/Mirror',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/gabriel-defender-mirror-1-copy.jpg'
            ],
            [
                'product_id' => 94,
                'name' => 'Gabriel Defender Sunglasses Gunmetal/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/gabriel-defender-mirror-1-copy-1.jpg'
            ],
            [
                'product_id' => 95,
                'name' => 'Jean Traveller Sunglasses Black/Solid Smoke',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/jean-traveller-black-1-copy.jpg'
            ],
            [
                'product_id' => 96,
                'name' => 'Julie Traveller Sunglasses Shiny Gold/Light Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/julie-traveller-1-copy.jpg'
            ],
            [
                'product_id' => 97,
                'name' => 'Justine Explorer Sunglasses Shiny Gold/Solid Green',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/justine-explorer-green-1-copy.jpg'
            ],
            [
                'product_id' => 98,
                'name' => 'Justine Explorer Sunglasses Shiny Silver/Smoke Mirror',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/justine-explorer-mirror-1-copy.jpg'
            ],
            [
                'product_id' => 99,
                'name' => 'Laurie Explorer Sunglasses Shiny Gold/Light Crystal',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/laurie-explorer-light-2-copy.jpg'
            ],
            [
                'product_id' => 100,
                'name' => 'Laurie Explorer Sunglasses Shiny Gold/Dark Crystal',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/laurie-explorer-dark-1-copy.jpg'
            ],
            [
                'product_id' => 101,
                'name' => 'Leo Pilot Sunglasses Turtle Brown/Gradiant Brown',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28829_leo_pilote_turtle_webb.jpg'
            ],
            [
                'product_id' => 102,
                'name' => 'Leo Pilot Sunglasses Light Brown/Gradiant Brown',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28826_leo_pilote_cognac_webb.jpg'
            ],
            [
                'product_id' => 103,
                'name' => 'Leo Pilot Sunglasses Black/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28828_leo_pilote_black_webb.jpg'
            ],
            [
                'product_id' => 104,
                'name' => 'Louis Skyfarer Sunglasses Black/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/louis-skyfarer-black-1-copy.jpg'
            ],
            [
                'product_id' => 105,
                'name' => 'Louis Skyfarer Sunglasses Turtle Brown/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/louis-skyfarer-turtle-1-copy.jpg'
            ],
            [
                'product_id' => 106,
                'name' => 'Louis Skyfarer Sunglasses White/Mirror',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/louis-skyfarer-white-1-copy.jpg'
            ],
            [
                'product_id' => 107,
                'name' => 'Marc Ruler Sunglasses Black/Smoke Gradient',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28815_marc_ruler_black_webb.jpg'
            ],
            [
                'product_id' => 108,
                'name' => 'Marc Ruler Sunglasses Turtle Brown/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28796_marc_ruler_turtle_webb.jpg'
            ],
            [
                'product_id' => 109,
                'name' => 'Marc Ruler Sunglasses Light Brown/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28812_marc_ruler_cognac_webb.jpg'
            ],
            [
                'product_id' => 110,
                'name' => 'Marion Explorer Sunglasses Turtle Brown/Shiny Gold',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/marion-explorer-1-copy.jpg'
            ],
            [
                'product_id' => 111,
                'name' => 'Martin Pilot Sunglasses Black/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/martin-pilot-black-1-copy.jpg'
            ],
            [
                'product_id' => 112,
                'name' => 'Martin Pilot Sunglasses Turtle Brown/Brown Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/martin-pilot-brown-1-copy.jpg'
            ],
            [
                'product_id' => 113,
                'name' => 'Martin Pilot Sunglasses White/Mirror',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/martin-pilot-white-1-copy.jpg'
            ],
            [
                'product_id' => 114,
                'name' => 'Nathan Pilot Sunglasses',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/job_9902_nathan_pilot_v1-copy-300x300.jpg'
            ],
            [
                'product_id' => 115,
                'name' => 'Sarah Traveller Sunglasses Turtle Brown/Shiny Gold',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/job_9897_sarah_traveller_dark_v1-copy-300x300.jpg'
            ],
            [
                'product_id' => 116,
                'name' => 'Sarah Traveller Sunglasses Crystal Brown/Shiny Gold',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/sarah-traveller-pink-1-copy.jpg'
            ],
            [
                'product_id' => 117,
                'name' => 'Zoe Fashionista Sunglasses Black/Solid Smoke',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28822_zoe_fashionista_black_webb.jpg'
            ],
            [
                'product_id' => 118,
                'name' => 'Zoe Fashionista Sunglasses Turtle Brown/Smoke Gradiant',
                'media_url' => 'https://saintroches.gatezen.co/wp-content/uploads/2022/08/capture-one-catalog28818_zoe_fashionista_turtle_webb.jpg'
            ],
        ];

        foreach ($saintRochersProductMedias as $saintRochersProductMedia) {
            ProductMedia::updateOrCreate([
                'product_id' => $saintRochersProductMedia['product_id'],
            ], [
                'product_id' => $saintRochersProductMedia['product_id'],
                'name' => $saintRochersProductMedia['name'],
                'media_url' => $saintRochersProductMedia['media_url'],
                'is_featured' => 1,
                'created_at' => Carbon::now()
            ]);
        }

        $haugerProductMedias = [
            [
                'product_id' => 119,
                'name' => 'Hauger Excellence V Master Automatic 44mm Gold Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/job_9392_exelence_v_master_goldcase_black_dial-640x800-1-600x750.png'
            ],
            [
                'product_id' => 120,
                'name' => 'Hauger Excellence V Master Automatic 44mm Silver Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_grand_courage_chrome_black_dial-2-640x800-2-600x750.png'
            ],
            [
                'product_id' => 121,
                'name' => 'Hauger Golden Valor Chronograph 42mm Gold Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/golden_valor_gold_black_dial_goldband-640x800-1-600x750.png'
            ],
            [
                'product_id' => 121,
                'name' => 'Hauger Golden Valor Chronograph 42mm Gold Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/golden_valor_gold_white_dial-640x800-1-600x750.png'
            ],
            [
                'product_id' => 123,
                'name' => 'Hauger Golden Valor Chronograph 42mm Silver Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/golden_valor_gold_black_dial_silverband-640x800-1-600x750.png'
            ],
            [
                'product_id' => 124,
                'name' => 'Hauger Golden Valor Chronograph 42mm Silver Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/golden_valor_white_dial_chrome-1-640x800-2-600x750.png'
            ],
            [
                'product_id' => 125,
                'name' => 'Hauger Grand Courage Automatic 40mm Gold Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/grand_courage_gold_black_dial-3-640x800-1-600x750.png'
            ],
            [
                'product_id' => 126,
                'name' => 'Hauger Grand Courage Automatic 40mm Gold Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/grand_courage_gold_white_dial-2-640x800-1-600x750.png'
            ],
            [
                'product_id' => 127,
                'name' => 'Hauger Grand Courage Automatic 40mm Silver Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/grand_courage_chrome_black_dial-4-640x800-1-600x750.png'
            ],
            [
                'product_id' => 128,
                'name' => 'Hauger Grand Courage Automatic 40mm Silver Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/grand_courage_chrome_white_dial-3-640x800-1-600x750.png'
            ]
        ];

        foreach ($haugerProductMedias as $haugerProductMedia) {
            ProductMedia::updateOrCreate([
                'product_id' => $haugerProductMedia['product_id'],
            ], [
                'product_id' => $haugerProductMedia['product_id'],
                'name' => $haugerProductMedia['name'],
                'media_url' => $haugerProductMedia['media_url'],
                'is_featured' => 1,
                'created_at' => Carbon::now()
            ]);
        }

        $hauger2ProductMedias = [
            [
                'product_id' => 129,
                'name' => 'Hauger Princess Excellence V Master Automatic 38mm Gold Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_exellence_v_master_gold_black_dial-640x800-2-600x750.png'
            ],
            [
                'product_id' => 130,
                'name' => 'Hauger Princess Excellence V Master Automatic 38mm Silver Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_exellence_v_master_chrome_black_dial-640x800-1-600x750.png'
            ],
            [
                'product_id' => 131,
                'name' => 'Hauger Princess Golden Valor 34mm Gold Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_golden_valor_black_dial_gold-1-640x800-1-600x750.png'
            ],
            [
                'product_id' => 132,
                'name' => 'Hauger Princess Golden Valor 34mm Gold Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_grand_courage_gold_white_dial-2-640x800-2-600x750.png'
            ],
            [
                'product_id' => 133,
                'name' => 'Hauger Princess Golden Valor 34mm Silver Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_golden_valor_black_dial_chrome-1-640x800-1-600x750.png'
            ],
            [
                'product_id' => 134,
                'name' => 'Hauger Princess Golden Valor 34mm Silver Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_golden_valor_white_dial_chrome-1-640x800-1-600x750.png'
            ],
            [
                'product_id' => 135,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Gold Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_grand_courage_gold_black_dial-2-640x800-1-600x750.png'
            ],
            [
                'product_id' => 136,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Gold Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_grand_courage_gold_white_dial-2-640x800-1-600x750.png'
            ],
            [
                'product_id' => 137,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Silver Stainless Steel / Black',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_grand_courage_chrome_black_dial-2-640x800-1-600x750.png'
            ],
            [
                'product_id' => 138,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Silver Stainless Steel / Eggshell',
                'media_url' => 'https://hauger.gatezen.co/wp-content/uploads/2022/09/princess_golden_valor_white_dial_chrome-1-640x800-2-600x750.png'
            ]
        ];

        foreach ($hauger2ProductMedias as $hauger2ProductMedia) {
            ProductMedia::updateOrCreate([
                'product_id' => $hauger2ProductMedia['product_id'],
            ], [
                'product_id' => $hauger2ProductMedia['product_id'],
                'name' => $hauger2ProductMedia['name'],
                'media_url' => $hauger2ProductMedia['media_url'],
                'is_featured' => 1,
                'created_at' => Carbon::now()
            ]);
        }

        // $getmbracedProductMedias = [
        //     [
        //         'product_id' => 142,
        //         'name' => 'Forest Green Braided Silver Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/08/Studio-Session-241.png'
        //     ],
        //     [
        //         'product_id' => 143,
        //         'name' => 'Wine Braided Silver Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/08/Studio-Session-240.png'
        //     ],
        //     [
        //         'product_id' => 144,
        //         'name' => 'Green Braided Silver Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/08/Studio-Session-239.png'
        //     ],
        //     [
        //         'product_id' => 145,
        //         'name' => 'Beige Braided Silver Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/08/Studio-Session-238.png'
        //     ],
        //     [
        //         'product_id' => 146,
        //         'name' => 'Yellow Braided Silver Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/08/Studio-Session-237.png'
        //     ],
        //     [
        //         'product_id' => 147,
        //         'name' => 'Black Braided Gold Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/08/Studio-Session-236.png'
        //     ],
        //     [
        //         'product_id' => 148,
        //         'name' => 'Brown Braided Silver Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/08/Studio-Session-233.png'
        //     ],
        //     [
        //         'product_id' => 149,
        //         'name' => 'Breaded 6mm Single Wrap with Silver Lock',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/bx3.1.yg-Main-Black-StrapsCo-Leather-Bolo-Bracelet-with-Yellow-Gold-Clasp-1.jpeg'
        //     ],
        //     [
        //         'product_id' => 150,
        //         'name' => 'Boho Lava Rock Natural Stones with Metal Details',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/H88023669d7ac41a5851eaf20d09f4e15s.jpg_960x960.jpg.webp'
        //     ],
        //     [
        //         'product_id' => 151,
        //         'name' => 'Fully Matte Black Frosted Stone With Zircon Ball',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/H7874d36b115f4f98bd643986b18ab368H.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 152,
        //         'name' => 'Single Black Onyx with Match Fire Agate',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB1yU2GXgTqK1RjSZPhq6xfOFXaj.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 153,
        //         'name' => 'Malachite Rough Beads with Silver Buddha Head',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB1er56c6fguuRjSszcq6zb7FXaU.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 154,
        //         'name' => 'Amethyst Natural Stones with Brass Tibetan Pure Copper',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/Hc03f6989526f48f888d8f5a0beb76c3cC.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 155,
        //         'name' => 'Natural Alloy Stone with Silver Owl',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB1jLjJB5OYBuNjSsD4q6zSkFXap.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 156,
        //         'name' => 'Natural Malachite Stone Beads with Silver Skull',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB1s8ptIgaTBuNjSszfq6xgfpXa1.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 157,
        //         'name' => 'Amethyst Chakra Brass Tibetan Pure Copper',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/H8c482425b6e64f2aa6489fb03b41f1ebf.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 158,
        //         'name' => 'Green Pine Natural Stones',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/H532ca12a92344fc29973134c26b5d17cW.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 159,
        //         'name' => 'Brushed Square Silver',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/Studio-Session-273Silver2.png'
        //     ],
        //     [
        //         'product_id' => 160,
        //         'name' => 'Matt Black Square',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/Studio-Session-2002.png'
        //     ],
        //     [
        //         'product_id' => 161,
        //         'name' => 'Fully Twisted Polished Rose Gold #1',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/09/Studio-Session-205.png'
        //     ],
        //     [
        //         'product_id' => 162,
        //         'name' => 'Plain 5mm Polished Gold #3',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/09/Studio-Session-206.png'
        //     ],
        //     [
        //         'product_id' => 163,
        //         'name' => 'Polished Single Twist Gold #2',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/09/Studio-Session-214.png'
        //     ],
        //     [
        //         'product_id' => 164,
        //         'name' => 'Brushed Square Rose Gold #1',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/09/Studio-Session-273.png'
        //     ],
        //     [
        //         'product_id' => 165,
        //         'name' => 'Brushed Silver #1',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/09/Studio-Session-278.png'
        //     ],
        //     [
        //         'product_id' => 166,
        //         'name' => 'String Bracelet #1',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB1WiXpXhrvK1RjSszeq6yObFXaY.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 167,
        //         'name' => 'Gun Black Beads with Cubid Zirconia Crown Ball',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB13okVafQypeRjt_bXq6yZuXXaV.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 168,
        //         'name' => 'Austrian Rhinestones with Zirconia',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/Hcd96d9bf7adf42c59763ff906f5364b1l.jpg_960x960.jpg.webp'
        //     ],
        //     [
        //         'product_id' => 169,
        //         'name' => 'Zirconia Rose Gold Macramest String',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB1J0qAOpXXXXb0XXXXq6xXFXXXb.jpg_960x960.jpg-copy.jpg'
        //     ],
        //     [
        //         'product_id' => 170,
        //         'name' => 'Adjustable Miyuki Pattern',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/H61ff42b681544c3d8c586bc1b0b5f7fe3.jpg_960x960.jpg.webp'
        //     ],
        //     [
        //         'product_id' => 171,
        //         'name' => 'Blue Braded String with Crystal Ball',
        //         'media_url' => 'https://getmbraced.com/wp-content/uploads/2022/10/HTB1Lt0beAfb_uJkSnaVq6xFmVXa1.jpg_960x960.jpg-copy.jpg'
        //     ]
        // ];

        // foreach ($getmbracedProductMedias as $getmbracedProductMedia) {
        //     ProductMedia::updateOrCreate([
        //         'product_id' => $getmbracedProductMedia['product_id'],
        //     ], [
        //         'product_id' => $getmbracedProductMedia['product_id'],
        //         'name' => $getmbracedProductMedia['name'],
        //         'media_url' => $getmbracedProductMedia['media_url'],
        //         'is_featured' => 1,
        //         'created_at' => Carbon::now()
        //     ]);
        // }

        // $clsProductMedias = [
        //     [
        //         'product_id' => 172,
        //         'name' => 'Casablanca by night',
        //         'media_url' => 'https://cls.gatezen.co/wp-content/uploads/2022/09/Casablanca-by-night-300x300.jpg'
        //     ],
        //     [
        //         'product_id' => 173,
        //         'name' => 'Yespresso 8.2',
        //         'media_url' => 'https://cls.gatezen.co/wp-content/uploads/2022/09/YESPRESSO-8-2-300x300.jpg'
        //     ],
        //     [
        //         'product_id' => 174,
        //         'name' => 'Your place or mine?',
        //         'media_url' => 'https://cls.gatezen.co/wp-content/uploads/2022/09/Your-place%E2%80%A8or-mine-300x300.jpg'
        //     ],
        //     [
        //         'product_id' => 175,
        //         'name' => 'The Coffee Box 1 (beans)',
        //         'media_url' => 'https://cls.gatezen.co/wp-content/uploads/2022/09/box-1-300x300.jpg'
        //     ],
        //     [
        //         'product_id' => 176,
        //         'name' => 'Casablanca by night',
        //         'media_url' => 'https://cls.gatezen.co/wp-content/uploads/2022/09/Casablanca-by-night-2-300x300.jpg'
        //     ],
        //     [
        //         'product_id' => 177,
        //         'name' => 'Your place or mine?',
        //         'media_url' => 'https://cls.gatezen.co/wp-content/uploads/2022/09/Your-place%E2%80%A8or-minexx-300x300.jpg'
        //     ],
        //     [
        //         'product_id' => 178,
        //         'name' => 'The Coffee Box 2 (grounded)',
        //         'media_url' => 'https://cls.gatezen.co/wp-content/uploads/2022/09/box-2-300x300.jpg'
        //     ],
        // ];

        // foreach ($clsProductMedias as $clsProductMedia) {
        //     ProductMedia::updateOrCreate([
        //         'product_id' => $clsProductMedia['product_id'],
        //     ], [
        //         'product_id' => $clsProductMedia['product_id'],
        //         'name' => $clsProductMedia['name'],
        //         'media_url' => $clsProductMedia['media_url'],
        //         'is_featured' => 1,
        //         'created_at' => Carbon::now()
        //     ]);
        // }
    }
}
