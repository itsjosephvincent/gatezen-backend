<?php

namespace Tests\Feature\Customer;

use Faker\Factory as Faker;
use App\Models\Customer;
use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_customer_order_list()
    {
        $customer = Customer::take(1)->first();
        $token = $customer->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/customer/orders')
            ->assertStatus(200);
    }

    public function test_get_order_by_id()
    {
        $customer = Customer::take(1)->first();
        $token = $customer->createToken('token-name');
        $orderId = Order::all()->random()->id;

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/customer/orders/' . $orderId)
            ->assertStatus(200);
    }

    public function test_valid_order_id_is_required()
    {
        $this->faker = Faker::create();
        $customer = Customer::take(1)->first();
        $token = $customer->createToken('token-name');
        $orderId = $this->faker->numberBetween(100000, 999999);

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/customer/orders/' . $orderId)
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Order with ID:' . $orderId . ' not found.'
            ]);
    }
}
