<?php

namespace Tests\Feature\User;

use App\Models\Country;
use Faker\Factory as Faker;
use App\Models\Customer;
use App\Models\User;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function test_customer_list()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/customers')
            ->assertStatus(200);
    }

    public function test_customer_sales()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/customers/' . $customer->id . '/orders')
            ->assertStatus(200);
    }

    public function test_updated_address_fields_required()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $payload = [
            'address_type' => '',
            'address_1' => '',
            'city' => '',
            'postal_code' => '',
            'country_id' => ''
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id . '/update-address', $payload)
            ->assertStatus(422);
    }

    public function test_update_customer_address()
    {
        $this->faker = Faker::create();
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');
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
            ->json('PUT', 'api/user/customers/' . $customer->id . '/update-address', $payload)
            ->assertStatus(200);
    }

    public function test_valid_password_is_required()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $payload = [
            'password' => 'asd'
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id . '/update-password', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        'The password must be at least 8 characters.'
                    ]
                ]
            ]);
    }

    public function test_update_customer_password()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $payload = [
            'password' => 'password'
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id . '/update-password', $payload)
            ->assertStatus(200);
    }

    public function test_disable_customer_status()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $payload = [
            'is_active' => 0
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id . '/update-status', $payload)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $customer->id,
                    'user_id' => $customer->user_id,
                    'store_id' => $customer->store_id,
                    'customer_type' => $customer->customer_type,
                    'company_name' => $customer->company_name,
                    'business_number' => $customer->business_number,
                    'first_name' => $customer->first_name,
                    'last_name' => $customer->last_name,
                    'birthdate' => $customer->birthdate,
                    'gender' => $customer->gender,
                    'email' => $customer->email,
                    'mobile' => $customer->mobile,
                    'img_url' => $customer->img_url,
                    'is_active' => 0,
                    'is_2fa_enabled' => $customer->is_2fa_enabled,
                    'created_at' => '2022-07-25T12:00:39.000000Z'
                ]
            ]);
    }

    public function test_enable_customer_status()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $payload = [
            'is_active' => 1
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id . '/update-status', $payload)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $customer->id,
                    'user_id' => $customer->user_id,
                    'store_id' => $customer->store_id,
                    'customer_type' => $customer->customer_type,
                    'company_name' => $customer->company_name,
                    'business_number' => $customer->business_number,
                    'first_name' => $customer->first_name,
                    'last_name' => $customer->last_name,
                    'birthdate' => $customer->birthdate,
                    'gender' => $customer->gender,
                    'email' => $customer->email,
                    'mobile' => $customer->mobile,
                    'img_url' => $customer->img_url,
                    'is_active' => 1,
                    'is_2fa_enabled' => $customer->is_2fa_enabled,
                    'created_at' => '2022-07-25T12:00:39.000000Z'
                ]
            ]);
    }

    public function test_disable_google_2fa()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id . '/disable-2fa')
            ->assertStatus(200);
    }

    public function test_all_fields_required()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $payload = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'mobile' => ''
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id, $payload)
            ->assertStatus(422);
    }

    public function test_can_update_customer()
    {
        $user = User::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');
        $this->faker = Faker::create();

        $payload = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'mobile' => $this->faker->phoneNumber()
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/customers/' . $customer->id, $payload)
            ->assertStatus(200);
    }
}
