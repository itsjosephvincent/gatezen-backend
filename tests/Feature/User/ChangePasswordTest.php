<?php

namespace Tests\Feature\User;

use App\Models\PasswordReset;
use App\Models\User;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    public function test_token_and_valid_password_is_required()
    {
        $payload = [
            'token' => '',
            'password' => 'asd'
        ];

        $this->json('POST', 'api/user/reset-password', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        'The password must be at least 8 characters.'
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

        $this->json('POST', 'api/user/reset-password', $payload)
            ->assertStatus(422);
    }

    public function test_password_is_required()
    {
        $user = User::take(1)->first();
        $token = PasswordReset::where('email', $user->email)->first();
        $payload = [
            'token' => $token->token,
            'password' => ''
        ];

        $this->json('POST', 'api/user/reset-password', $payload)
            ->assertStatus(422);
    }

    public function test_token_must_be_string()
    {
        $payload = [
            'token' => rand(),
            'password' => 'password'
        ];

        $this->json('POST', 'api/user/reset-password', $payload)
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

        $this->json('POST', 'api/user/reset-password', $payload)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid password reset token.'
            ]);
    }

    public function test_user_can_change_password()
    {
        $user = User::take(1)->first();
        $token = PasswordReset::where('email', $user->email)->first();
        $payload = [
            'token' => $token->token,
            'password' => 'password'
        ];

        $this->json('POST', 'api/user/reset-password', $payload)
            ->assertStatus(200);
    }
}
