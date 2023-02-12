<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'Stripe',
                'description' => 'Stripe Checkout',
                'url_endpoint' => '/customer/checkout/stripe',
                'is_active' => true,
                'created_at' => Carbon::now()
            ],
            // [
            //     'name' => 'Klarna',
            //     'description' => 'Klarna Checkout',
            //     'url_endpoint' => '/customer/checkout/klarna',
            //     'is_active' => true,
            //     'created_at' => Carbon::now()
            // ]
        ]);
    }
}
