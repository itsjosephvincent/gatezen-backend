<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserBankDetail;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserBankDetailsSeeder extends Seeder
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

            UserBankDetail::create([
                'user_id' => User::all()->random()->id,
                'account_number' => $faker->bankAccountNumber(),
                'account_name' => $faker->name(),
                'bank_name' => $faker->name(),
                'bank_swift_code' => $faker->word()
            ]);
        }
    }
}
