<?php

namespace Tests\Feature\Admin;

use Faker\Factory as Faker;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function test_customer_list()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/customers')
            ->assertStatus(200);
    }

    public function test_invalid_customer_id()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $this->faker = Faker::create();
        $customerId = $this->faker->numberBetween(100000, 999999);

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/customers/' . $customerId)
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Customer with ID:' . $customerId . ' not found.'
            ]);
    }

    public function test_get_customer_by_id()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/customers/' . $customer->id)
            ->assertStatus(200);
    }

    public function test_get_customer_orders()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/customers/' . $customer->id . '/orders')
            ->assertStatus(200);
    }

    public function test_status_field_is_required()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();

        $payload = [
            'is_active' => ''
        ];


        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customer->id . '/update-status', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'is_active' => [
                        'The is active field is required.'
                    ]
                ]
            ]);
    }


    public function test_disable_customer_status()
    {
        $user = Admin::take(1)->first();
        $customer = Customer::take(1)->first();
        $token = $user->createToken('token-name');

        $payload = [
            'is_active' => 0
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customer->id . '/update-status', $payload)
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
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();

        $payload = [
            'is_active' => 1
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customer->id . '/update-status', $payload)
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

    public function test_all_fields_required()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();

        $payload = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'mobile' => ''
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customer->id, $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'first_name' => [
                        'The first name field is required.'
                    ],
                    'last_name' => [
                        'The last name field is required.'
                    ],
                    'email' => [
                        'The email field is required.'
                    ],
                    'mobile' => [
                        'The mobile field is required.'
                    ]
                ]
            ]);
    }

    public function test_can_update_customer()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();
        $this->faker = Faker::create();

        $payload = [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'mobile' => $this->faker->phoneNumber()
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customer->id, $payload)
            ->assertStatus(200);
    }

    public function test_invalid_new_password()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customerId = Customer::all()->random()->id;

        $payload = [
            'password' => 'asdasd'
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customerId . '/update-password', $payload)
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
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customerId = Customer::all()->random()->id;

        $payload = [
            'password' => 'password'
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customerId . '/update-password', $payload)
            ->assertStatus(200);
    }

    public function test_disable_google_2fa()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customer->id . '/disable-2fa')
            ->assertStatus(200);
    }

    public function test_update_address_fields_required()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customerId = Customer::all()->random()->id;

        $payload = [
            'address_type' => '',
            'address_1' => '',
            'address_2' => '',
            'city' => '',
            'postal_code' => '',
            'country_id' => ''
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/customers/' . $customerId . '/update-address', $payload)
            ->assertStatus(422);
    }

    public function test_udpate_customer_address()
    {
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $customer = Customer::take(1)->first();
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
            ->json('PUT', 'api/admin/customers/' . $customer->id . '/update-address', $payload)
            ->assertStatus(200);
    }
}
