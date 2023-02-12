<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;
use App\Models\User;
use Carbon\Carbon;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = User::all()->random()->id;
        $user_name = User::find($user_id)->first_name;
        return [
            'user_id' => $user_id,
            'care_of' => $user_name,
            'address_1' => $this->faker->streetName(),
            'address_2' => $this->faker->buildingNumber(),
            'postal_code' => $this->faker->postCode(),
            'city' => $this->faker->city(),
            'country_id' => Country::all()->random()->id,
            'created_at' => Carbon::now()
        ];
    }
}
