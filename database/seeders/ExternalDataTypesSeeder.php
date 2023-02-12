<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExternalDataTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('external_data_types')->insert([
            [
                'name' => 'Zoho Inventory',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Zoho Contacts',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Zoho Sales Order',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Zoho Sales Invoice',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Zoho Item Adjustment',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Mail Jet Contact',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
