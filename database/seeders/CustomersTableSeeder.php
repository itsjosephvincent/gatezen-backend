<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Traits\EncryptionTraits;
use Illuminate\Database\Seeder;
use App\Traits\Google2FATraits;
use Faker\Factory as Faker;
use App\Models\Customer;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    use Google2FATraits, EncryptionTraits;

    public function run()
    {
        if (env('APP_ENV') === 'local') {
            $faker = Faker::create();
            $google_key = $this->generateGoogleSecretKey();
            $encrypted_google_key = $this->encrypt($google_key);

            $customerUser = Customer::create([
                'user_id' => 1,
                'store_id' => 1,
                'customer_type' => $faker->randomElement(['individual', 'company']),
                'company_name' => $faker->name . 'Inc.',
                'business_number' => $faker->tollFreePhoneNumber,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'display_name' => $faker->firstName . ' ' . $faker->lastName,
                'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'gender' => $faker->randomElement(['male', 'female']),
                'email' => 'customer@gatezen.com',
                'mobile' => $faker->phoneNumber,
                'password' => Hash::make('Cust0mer2023!'),
                'img_url' => $faker->imageUrl,
                'is_active' => 1,
                'email_verified_at' => null,
                'is_2fa_enabled' => 'disabled',
                'google2fa_secret' => $encrypted_google_key,
                'created_at' => Carbon::now()
            ]);
            $customerUser->assignRole('consumer');

            $customerUser2 = Customer::create([
                'user_id' => 1,
                'store_id' => 2,
                'customer_type' => $faker->randomElement(['individual', 'company']),
                'company_name' => $faker->name . 'Inc.',
                'business_number' => $faker->tollFreePhoneNumber,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'display_name' => $faker->firstName . ' ' . $faker->lastName,
                'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'gender' => $faker->randomElement(['male', 'female']),
                'email' => 'customer@saintroches.com',
                'mobile' => $faker->phoneNumber,
                'password' => Hash::make('Cust0mer2023!'),
                'img_url' => $faker->imageUrl,
                'is_active' => 1,
                'email_verified_at' => null,
                'is_2fa_enabled' => 'disabled',
                'google2fa_secret' => $encrypted_google_key,
                'created_at' => Carbon::now()
            ]);
            $customerUser2->assignRole('consumer');

            $customerUser3 = Customer::create([
                'user_id' => 1,
                'store_id' => 3,
                'customer_type' => $faker->randomElement(['individual', 'company']),
                'company_name' => $faker->name . 'Inc.',
                'business_number' => $faker->tollFreePhoneNumber,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'display_name' => $faker->firstName . ' ' . $faker->lastName,
                'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'gender' => $faker->randomElement(['male', 'female']),
                'email' => 'customer@hauger.com',
                'mobile' => $faker->phoneNumber,
                'password' => Hash::make('Cust0mer2023!'),
                'img_url' => $faker->imageUrl,
                'is_active' => 1,
                'email_verified_at' => null,
                'is_2fa_enabled' => 'disabled',
                'google2fa_secret' => $encrypted_google_key,
                'created_at' => Carbon::now()
            ]);
            $customerUser3->assignRole('consumer');
        }
    }
}
