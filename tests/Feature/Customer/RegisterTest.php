<?php

namespace Tests\Feature\Customer;

use App\Models\Customer;
use App\Models\Store;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    public function test_all_fields_are_required()
    {
        $payload = [
            'store_url' => '',
            'customer_type' => '',
            'first_name' => '',
            'last_name' => '',
            'birthdate' => '',
            'gender' => '',
            'email' => '',
            'mobile' => '',
            'password' => '',
        ];

        $this->json('POST', 'api/customer/auth/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'store_url' => [
                        'The store url field is required.'
                    ],
                    'customer_type' => [
                        'The customer type field is required.'
                    ],
                    'first_name' => [
                        'The first name field is required.'
                    ],
                    'last_name' => [
                        'The last name field is required.'
                    ],
                    'birthdate' => [
                        'The birthdate field is required.'
                    ],
                    'gender' => [
                        'The gender field is required.'
                    ],
                    'email' => [
                        'The email field is required.'
                    ],
                    'mobile' => [
                        'The mobile field is required.'
                    ],
                    'password' => [
                        'The password field is required.'
                    ]
                ]
            ]);
    }

    public function test_customer_can_register()
    {
        $store = Store::take(1)->first();
        $payload = [
            'store_url' => $store->url,
            'customer_type' => 'company',
            'company_name' => 'Schuyler Batz II Inc.',
            'business_number' => '(877) 776-0280',
            'first_name' => 'Test first name',
            'last_name' => 'Test last name',
            'birthdate' => '1994-08-18',
            'gender' => 'male',
            'email' => rand() . '2022@gmail.com',
            'mobile' => '09987654321',
            'password' => 'password',
        ];

        $this->json('POST', 'api/customer/auth/register', $payload)
            ->assertStatus(200);
    }

    public function test_email_already_exist()
    {
        $store = Store::take(1)->first();
        $customer = Customer::all()->random();
        $payload = [
            'store_url' => $store->url,
            'customer_type' => 'company',
            'company_name' => 'Schuyler Batz II Inc.',
            'business_number' => '(877) 776-0280',
            'first_name' => 'Test first name',
            'last_name' => 'Test last name',
            'birthdate' => '1994-08-18',
            'gender' => 'male',
            'email' => $customer->email,
            'mobile' => '09987654321',
            'password' => 'password',
        ];

        $this->json('POST', 'api/customer/auth/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => [
                        'The email has already been taken.'
                    ]
                ]
            ]);
    }
}
