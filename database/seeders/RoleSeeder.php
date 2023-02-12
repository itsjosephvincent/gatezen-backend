<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'store_owner',
            'type' => 'store',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'store_manager',
            'type' => 'store',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'store_salesman',
            'type' => 'store',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'consumer',
            'type' => 'customer',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'retailer',
            'type' => 'customer',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'wholesaler',
            'type' => 'customer',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'super_admin',
            'type' => 'global',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'admin',
            'type' => 'global',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'manager',
            'type' => 'global',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'name' => 'support',
            'type' => 'global',
            'created_at' => Carbon::now()
        ]);
    }
}
