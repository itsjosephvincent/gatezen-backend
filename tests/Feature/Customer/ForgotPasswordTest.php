<?php

namespace Tests\Feature\Customer;

use App\Models\Customer;
use App\Models\PasswordReset;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    public function test_valid_customer_email_is_required()
    {
        $payload = [
            'email' => rand() . 'xyz@gmail.com',
        ];

        $this->json('POST', 'api/customer/forgot-password', $payload)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'There is no account associated with the email address provided.'
            ]);
    }

    public function test_email_is_required()
    {
        $payload = [
            'email' => '',
        ];

        $this->json('POST', 'api/customer/forgot-password', $payload)
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

    public function test_customer_can_request_forgot_password()
    {
        $customer = Customer::take(1)->first();
        $payload = [
            'email' => $customer->email
        ];

        $this->json('POST', 'api/customer/forgot-password', $payload)
            ->assertStatus(200);
    }

    public function test_token_is_required()
    {
        $payload = [
            'token' => '',
        ];

        $this->json('POST', 'api/customer/verify-reset-password', $payload)
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

    public function test_valid_token_is_required()
    {
        $payload = [
            'token' => rand(),
        ];

        $this->json('POST', 'api/customer/verify-reset-password', $payload)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid password reset token.',
            ]);
    }

    public function test_token_is_verified()
    {
        $token = PasswordReset::take(1)->first();
        $payload = [
            'token' => $token->token,
        ];

        $this->json('POST', 'api/customer/verify-reset-password', $payload)
            ->assertStatus(200);
    }
}
