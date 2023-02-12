<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_email_and_password_is_required()
    {
        $credentials = [
            'email' => '',
            'password' => ''
        ];

        $this->json('POST', 'api/admin/auth/login', $credentials)
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

        $this->json('POST', 'api/admin/auth/login', $credentials)
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
        $admin =  Admin::all()->random();
        $credentials = [
            'email' => $admin->email,
            'password' => ''
        ];

        $this->json('POST', 'api/admin/auth/login', $credentials)
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

        $this->json('POST', 'api/admin/auth/login', $credentials)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid login credentials.'
            ]);
    }

    public function test_valid_password_is_required()
    {
        $admin =  Admin::all()->random();
        $credentials = [
            'email' => $admin->email,
            'password' => rand()
        ];

        $this->json('POST', 'api/admin/auth/login', $credentials)
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid login credentials.'
            ]);
    }

    public function test_admin_can_login()
    {
        $admin =  Admin::take(1)->first();
        $credentials = [
            'email' => $admin->email,
            'password' => 'password'
        ];

        $this->json('POST', 'api/admin/auth/login', $credentials)
            ->assertStatus(200);
    }
}
