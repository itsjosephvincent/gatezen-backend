<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CustomerAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') === 'local') {
            $faker = Faker::create();
            $customer = Customer::all()->count();
            for ($i = 1; $i <= $customer; $i++) {
                CustomerAddress::create([
                    'customer_id' => $i,
                    'address_type' => $faker->randomElement(['billing', 'shipping']),
                    'care_of' => Str::random(5),
                    'address_1' => $faker->streetName(),
                    'address_2' => $faker->buildingNumber(),
                    'state' => $faker->state(),
                    'city' => $faker->city(),
                    'postal_code' => $faker->postcode(),
                    'country_id' => Country::all()->random()->id,
                    'delivery_notes' => $faker->sentence,
                    'created_at' => Carbon::now()
                ]);
            }
        }
    }
}
