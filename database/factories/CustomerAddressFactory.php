<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Country;
use Carbon\Carbon;

class CustomerAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address_type = $this->faker->randomElement(['home', 'office']);
        return [
            'customer_id' => Customer::all()->random()->id,
            'address_type' => $address_type,
            'care_of' => Str::random(5),
            'address_1' => $this->faker->streetName(),
            'address_2' => $this->faker->buildingNumber(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'country_id' => Country::all()->random()->id,
            'delivery_notes' => $this->faker->sentence(),
            'created_at' => Carbon::now()
        ];
    }
}
