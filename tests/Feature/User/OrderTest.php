<?php

namespace Tests\Feature\User;

use App\Models\Order;
use App\Models\Store;
use App\Models\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_user_sales_list()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/sales')
            ->assertStatus(200);
    }

    public function test_user_store_sales_list()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $store = Store::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/stores/' . $store->id . '/sales')
            ->assertStatus(200);
    }

    public function test_orders_by_id()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $orderId = Order::all()->random()->id;

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/sales/' . $orderId)
            ->assertStatus(200);
    }
}
