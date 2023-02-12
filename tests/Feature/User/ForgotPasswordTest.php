<?php

namespace Tests\Feature\User;

use App\Models\PasswordReset;
use App\Models\User;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    public function test_valid_user_email_is_required()
    {
        $payload = [
            'email' => rand() . 'xyz@gmail.com',
        ];

        $this->json('POST', 'api/user/forgot-password', $payload)
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

        $this->json('POST', 'api/user/forgot-password', $payload)
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

    public function test_user_can_request_forgot_password()
    {
        $user = User::take(1)->first();
        $payload = [
            'email' => $user->email
        ];

        $this->json('POST', 'api/user/forgot-password', $payload)
            ->assertStatus(200);
    }

    public function test_token_is_required()
    {
        $payload = [
            'token' => '',
        ];

        $this->json('POST', 'api/user/verify-reset-password', $payload)
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

        $this->json('POST', 'api/user/verify-reset-password', $payload)
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

        $this->json('POST', 'api/user/verify-reset-password', $payload)
            ->assertStatus(200);
    }
}
