<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommissionTest extends TestCase
{
    public function test_show_all_commission()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/commissions')
            ->assertStatus(200);
    }
}
