<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\Product;
use App\Models\StoreCategory;
use Faker\Factory as Faker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_get_all_products()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/products')
            ->assertStatus(200);
    }

    public function test_all_fields_are_required()
    {
        $payload = [
            'store_category_id' => '',
            'name' => '',
            'description' => '',
            'price' => '',
            'retail_price' => '',
            'wholesale_price' => '',
            'status' => ''
        ];

        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('POST', 'api/admin/products', $payload)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'store_category_id' => [
                        'The store category id field is required.'
                    ],
                    'name' => [
                        'The name field is required.'
                    ],
                    'description' => [
                        'The description field is required.'
                    ],
                    'price' => [
                        'The price field is required.'
                    ],
                    'retail_price' => [
                        'The retail price field is required.'
                    ],
                    'wholesale_price' => [
                        'The wholesale price field is required.'
                    ],
                    'status' => [
                        'The status field is required.'
                    ]
                ]
            ]);
    }

    public function test_can_add_new_product()
    {
        $storeCategoryId = StoreCategory::all()->random()->id;
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $payload = [
            'store_category_id' => $storeCategoryId,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'retail_price' => $this->faker->randomFloat(2, 1, 100),
            'wholesale_price' => $this->faker->randomFloat(2, 1, 100),
            'status' => $this->faker->randomElement(['pending', 'draft', 'active', 'deactivated'])
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('POST', 'api/admin/products', $payload)
            ->assertStatus(200);
    }

    public function test_get_product_by_id()
    {
        $productId = Product::all()->random()->id;
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/products/' . $productId)
            ->assertStatus(200);
    }

    public function test_can_update_product()
    {
        $productId = Product::all()->random()->id;
        $storeCategoryId = StoreCategory::all()->random()->id;
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $payload = [
            'store_category_id' => $storeCategoryId,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'retail_price' => $this->faker->randomFloat(2, 1, 100),
            'wholesale_price' => $this->faker->randomFloat(2, 1, 100),
            'status' => $this->faker->randomElement(['pending', 'draft', 'active', 'deactivated'])
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/products/' . $productId, $payload)
            ->assertStatus(200);
    }

    public function test_valid_product_id_is_required()
    {
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $productId = $this->faker->numberBetween(100000, 999999);

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/products/' . $productId)
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Product with ID:' . $productId . ' not found.'
            ]);
    }
}
