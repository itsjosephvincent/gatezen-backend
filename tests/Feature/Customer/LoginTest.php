<?php

namespace Tests\Feature\Customer;

use App\Models\Customer;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_email_and_password_is_required()
    {
        $credentials = [
            'email' => '',
            'password' => ''
        ];

        $this->json('POST', 'api/customer/auth/login', $credentials)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => [
                        'The email field is required.'
                    ],
                    'password' => [
                        'The password field is required.'
                    ]
                ]
            ]);
    }

    public function test_email_is_required()
    {
        $credentials = [
            'email' => '',
            'password' => 'password'
        ];

        $this->json('POST', 'api/customer/auth/login', $credentials)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => [
                        'The email field is required.'
                    ]
                ]
            ]);
    }

    public function test_password_is_required()
    {
        $customer = Customer::take(1)->first();
        $credentials = [
            'email' => $customer->email,
            'password' => ''
        ];

        $this->json('POST', 'api/customer/auth/login', $credentials)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        'The password field is required.'
                    ]
                ]
            ]);
    }

    public function test_valid_account_is_required()
    {
        $credentials = [
            'email' => rand() . 'xyz@gmail.com',
            'password' => 'password'
        ];

        $this->json('POST', 'api/customer/auth/login', $credentials)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid login credentials.'
            ]);
    }

    public function test_valid_password_is_required()
    {
        $customer = Customer::take(1)->first();
        $credentials = [
            'email' => $customer->email,
            'password' => rand()
        ];

        $this->json('POST', 'api/customer/auth/login', $credentials)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid login credentials.'
            ]);
    }

    public function test_customer_can_login()
    {
        $customer = Customer::take(1)->first();
        $credentials = [
            'email' => $customer->email,
            'password' => 'password'
        ];

        $this->json('POST', 'api/customer/auth/login', $credentials)
            ->assertStatus(200);
    }
}
