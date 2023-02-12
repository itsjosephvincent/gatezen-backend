<?php

namespace Tests\Feature\Customer;

use App\Models\Product;
use App\Models\Store;
use Faker\Factory as Faker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_get_all_products()
    {
        $store = Store::take(1)->first();
        $payload = [
            'store_url' => $store->url,
        ];

        $this->json('GET', 'api/customer/products', $payload)
            ->assertStatus(200);
    }

    public function test_get_product_by_id()
    {
        $productId = Product::all()->random()->id;

        $this->json('GET', 'api/customer/products/' . $productId)
            ->assertStatus(200);
    }

    public function test_product_id_must_be_valid()
    {
        $this->faker = Faker::create();
        $productId = $this->faker->numberBetween(100000, 999999);

        $this->json('GET', 'api/customer/products/' . $productId)
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Product with ID:' . $productId . ' not found.'
            ]);
    }
}
