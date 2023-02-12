<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\UserSubscription;
use Carbon\Carbon;

class UserSubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all()->count();
        for ($i = 1; $i <= $user; $i++) {
            UserSubscription::create([
                'plan_id' => Plan::all()->random()->id,
                'user_id' => $i,
                'created_at' => Carbon::now()
            ]);
        }
    }
}
