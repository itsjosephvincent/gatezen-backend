<?php

namespace Tests\Feature\User;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_email_and_password_is_required()
    {
        $credentials = [
            'email' => '',
            'password' => ''
        ];

        $this->json('POST', 'api/user/auth/login', $credentials)
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

        $this->json('POST', 'api/user/auth/login', $credentials)
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
        $user = User::take(1)->first();
        $credentials = [
            'email' => $user->email,
            'password' => ''
        ];

        $this->json('POST', 'api/user/auth/login', $credentials)
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

    public function test_valid_user_account_is_required()
    {
        $credentials = [
            'email' => rand() . 'xyz@gmail.com',
            'password' => 'password'
        ];

        $this->json('POST', 'api/user/auth/login', $credentials)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid login credentials.'
            ]);
    }

    public function test_valid_password_is_required()
    {
        $user = User::take(1)->first();
        $credentials = [
            'email' => $user->email,
            'password' => 'passwords'
        ];

        $this->json('POST', 'api/user/auth/login', $credentials)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid login credentials.'
            ]);
    }

    public function test_user_can_login()
    {
        $user = User::take(1)->first();
        $credentials = [
            'email' => $user->email,
            'password' => 'password'
        ];

        $this->json('POST', 'api/user/auth/login', $credentials)
            ->assertStatus(200);
    }
}
