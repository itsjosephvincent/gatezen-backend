<?php

namespace Tests\Feature\Customer;

use App\Models\Country;
use Faker\Factory as Faker;
use App\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function test_customer_address_list()
    {
        $customer = Customer::take(1)->first();
        $token = $customer->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/customer/customer-address')
            ->assertStatus(200);
    }

    public function test_address_fields_required()
    {
        $customer = Customer::take(1)->first();
        $token = $customer->createToken('token-name');

        $payload = [
            'address_type' => '',
            'address_1' => '',
            'city' => '',
            'postal_code' => '',
            'country_id' => ''
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('POST', 'api/customer/customer-address', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'address_type' => [
                        'The address type field is required.'
                    ],
                    'address_1' => [
                        'The address 1 field is required.'
                    ],
                    'city' => [
                        'The city field is required.'
                    ],
                    'postal_code' => [
                        'The postal code field is required.'
                    ],
                    'country_id' => [
                        'The country id field is required.'
                    ],
                ]
            ]);
    }

    public function test_add_new_address()
    {
        $this->faker = Faker::create();
        $customer = Customer::take(1)->first();
        $token = $customer->createToken('token-name');
        $countryId = Country::all()->random()->id;

        $payload = [
            'address_type' => $this->faker->randomElement(['home', 'office']),
            'address_1' => $this->faker->address(),
            'address_2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'country_id' => $countryId
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('POST', 'api/customer/customer-address', $payload)
            ->assertStatus(200);
    }
}
