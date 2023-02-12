<?php

namespace Tests\Feature\Customer;

use App\Models\Customer;
use App\Models\PasswordReset;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    public function test_token_and_password_is_required()
    {
        $payload = [
            'token' => '',
            'password' => ''
        ];

        $this->json('POST', 'api/customer/reset-password', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        'The password field is required.'
                    ],
                    'token' => [
                        'The token field is required.'
                    ]
                ]
            ]);
    }

    public function test_token_is_required()
    {
        $payload = [
            'token' => '',
            'password' => 'password'
        ];

        $this->json('POST', 'api/customer/reset-password', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'token' => [
                        'The token field is required.'
                    ]
                ]
            ]);
    }

    public function test_password_is_required()
    {
        $customer = Customer::take(1)->first();
        $token = PasswordReset::where('email', $customer->email)->first();
        $payload = [
            'token' => $token->token,
            'password' => ''
        ];

        $this->json('POST', 'api/customer/reset-password', $payload)
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

    public function test_token_must_be_string()
    {
        $payload = [
            'token' => rand(),
            'password' => 'password'
        ];

        $this->json('POST', 'api/customer/reset-password', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'token' => [
                        'The token must be a string.'
                    ]
                ]
            ]);
    }

    public function test_valid_token_is_required()
    {
        $payload = [
            'token' => rand() . 'xuyzdw',
            'password' => 'password'
        ];

        $this->json('POST', 'api/customer/reset-password', $payload)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid password reset token.'
            ]);
    }

    public function test_customer_can_change_password()
    {
        $customer = Customer::take(1)->first();
        $token = PasswordReset::where('email', $customer->email)->first();
        $payload = [
            'token' => $token->token,
            'password' => 'password'
        ];

        $this->json('POST', 'api/customer/reset-password', $payload)
            ->assertStatus(200);
    }
}
