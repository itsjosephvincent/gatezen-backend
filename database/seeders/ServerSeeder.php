<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Server;
use Carbon\Carbon;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Server::create([
            'ip_address' => '164.92.246.122',
            'created_at' => Carbon::now()
        ]);
    }
}
