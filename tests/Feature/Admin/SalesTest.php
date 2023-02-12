<?php

namespace Tests\Feature\Admin;

use Faker\Factory as Faker;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Tests\TestCase;

class SalesTest extends TestCase
{
    public function test_sales_list()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/sales')
            ->assertStatus(200);
    }

    public function test_invalid_sales_id()
    {
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $orderId = $this->faker->numberBetween(100000, 999999);

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/sales/' . $orderId)
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Order with ID:' . $orderId . ' not found.'
            ]);
    }

    public function test_get_sales_by_id()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $orderId = Order::all()->random()->id;

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/sales/' . $orderId)
            ->assertStatus(200);
    }

    public function test_get_sales_by_product_id()
    {
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $productId = Product::all()->random()->id;

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/products/' . $productId . '/sales')
            ->assertStatus(200);
    }
}
