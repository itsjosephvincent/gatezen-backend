<?php

namespace Database\Seeders;

use App\Models\Vat;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vat::create([
            'name' => '0%',
            'percentage' => 0.0,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '10%',
            'percentage' => 0.1,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '20%',
            'percentage' => 0.2,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '30%',
            'percentage' => 0.3,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '40%',
            'percentage' => 0.4,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '50%',
            'percentage' => 0.5,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '60%',
            'percentage' => 0.6,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '70%',
            'percentage' => 0.7,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '80%',
            'percentage' => 0.8,
            'created_at' => Carbon::now()
        ]);
        Vat::create([
            'name' => '90%',
            'percentage' => 0.9,
            'created_at' => Carbon::now()
        ]);
    }
}
