<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingContactListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marketing_contact_lists')->insert([
            [
                'store_id' => 1,
                'provider' => 'MailJet',
                'channel' => 'email',
                'name' => 'CBD Shop Newsletter',
                'list_id' => '23964',
                'type' => 'store_customer',
                'store_category_id' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'store_id' => 3,
                'provider' => 'MailJet',
                'channel' => 'email',
                'name' => 'Hauger Shops User Newsletter',
                'list_id' => '25421',
                'type' => 'store_customer',
                'store_category_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'store_id' => 2,
                'provider' => 'MailJet',
                'channel' => 'email',
                'name' => 'Saintroches Shops User Newsletter',
                'list_id' => '25422',
                'type' => 'store_customer',
                'store_category_id' => 4,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
