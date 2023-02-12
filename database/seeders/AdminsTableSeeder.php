<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Traits\EncryptionTraits;
use Illuminate\Database\Seeder;
use App\Traits\Google2FATraits;
use Faker\Factory as Faker;
use App\Models\Admin;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    use Google2FATraits, EncryptionTraits;

    public function run()
    {
        if (env('APP_ENV') === 'local') {
            $faker = Faker::create();
            $gender = $faker->randomElement(['Male', 'Female']);
            $google_key = $this->generateGoogleSecretKey();
            $encrypted_google_key = $this->encrypt($google_key);
            $password = env('ADMIN_PASSWORD');

            $admin_1 = Admin::updateOrCreate([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'birthdate' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'gender' => $gender,
                'email' => 'admin@gatezen.com',
                'password' => Hash::make($password),
                'confirmed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'img_url' => $faker->imageUrl(),
                'google_2fa_secret' => $encrypted_google_key,
                'is_active' => 1,
                'created_at' => Carbon::now()
            ]);
            $admin_1->assignRole('super_admin');

            $admin_2 = Admin::updateOrCreate([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'birthdate' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'gender' => $gender,
                'email' => str_replace('@', date('Ymdhis') . '@', $faker->unique()->email),
                'password' => Hash::make($password),
                'confirmed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'img_url' => $faker->imageUrl(),
                'google_2fa_secret' => $encrypted_google_key,
                'is_active' => 1,
                'created_at' => Carbon::now()
            ]);
            $admin_2->assignRole('admin');

            $admin_3 = Admin::updateOrCreate([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'birthdate' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'gender' => $gender,
                'email' => str_replace('@', date('Ymdhis') . '@', $faker->unique()->email),
                'password' => Hash::make($password),
                'confirmed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'img_url' => $faker->imageUrl(),
                'google_2fa_secret' => $encrypted_google_key,
                'is_active' => 1,
                'created_at' => Carbon::now()
            ]);
            $admin_3->assignRole('manager');

            $admin_4 = Admin::updateOrCreate([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'birthdate' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'gender' => $gender,
                'email' => str_replace('@', date('Ymdhis') . '@', $faker->unique()->email),
                'password' => Hash::make($password),
                'confirmed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'img_url' => $faker->imageUrl(),
                'google_2fa_secret' => $encrypted_google_key,
                'is_active' => 1,
                'created_at' => Carbon::now()
            ]);
            $admin_4->assignRole('support');
        }

        if (env('APP_ENV') === 'prod') {
            $faker = Faker::create();
            $gender = $faker->randomElement(['Male', 'Female']);
            $google_key = $this->generateGoogleSecretKey();
            $encrypted_google_key = $this->encrypt($google_key);
            $password = 'ekee#LEi29';

            $admin_1 = Admin::updateOrCreate([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'birthdate' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'gender' => $gender,
                'email' => 'superadmin@gatezen.co',
                'password' => Hash::make($password),
                'confirmed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'img_url' => $faker->imageUrl(),
                'google_2fa_secret' => $encrypted_google_key,
                'is_active' => 1,
                'created_at' => Carbon::now()
            ]);
            $admin_1->assignRole('super_admin');

            $admin_2 = Admin::updateOrCreate([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'birthdate' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'gender' => $gender,
                'email' => 'admin@gatezen.co',
                'password' => Hash::make($password),
                'confirmed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'img_url' => $faker->imageUrl(),
                'google_2fa_secret' => $encrypted_google_key,
                'is_active' => 1,
                'created_at' => Carbon::now()
            ]);
            $admin_2->assignRole('admin');
        }
    }
}
