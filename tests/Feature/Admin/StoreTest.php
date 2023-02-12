<?php

namespace Tests\Feature\Admin;

use Faker\Factory as Faker;
use App\Models\Admin;
use App\Models\Store;
use App\Models\StoreCategory;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function test_store_list()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/stores')
            ->assertStatus(200);
    }

    public function test_get_store_by_id()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $storeId = Store::all()->random()->id;

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/stores/' . $storeId)
            ->assertStatus(200);
    }

    public function test_valid_store_id_is_required()
    {
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $storeId = $this->faker->numberBetween(100000, 999999);

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/stores/' . $storeId)
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Store with ID:' . $storeId . ' not found.'
            ]);
    }

    public function test_update_store()
    {
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $store = Store::take(1)->first();
        $storeCategoryId = StoreCategory::all()->random()->id;

        $status = $this->faker->randomElement(['active', 'deactivated', 'pending']);
        $private = $this->faker->boolean();
        $wholesaler = $this->faker->boolean();
        $storeName = $this->faker->word();

        $payload = [
            'is_private' => $private,
            'is_wholesaler' => $wholesaler,
            'status' => $status,
            'store_category_id' => $storeCategoryId,
            'store_name' => $storeName
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/stores/' . $store->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $store->id,
                    'template_id' => $store->template_id,
                    'store_category_id' => $storeCategoryId,
                    'url' => $store->url,
                    'store_name' => $storeName,
                    'status' => $status,
                    'is_private' => $private,
                    'is_wholesaler' => $wholesaler,
                    'theme_color' => $store->theme_color,
                    'text_color' => $store->text_color,
                    'template_version' => $store->template_version,
                    'created_at' => '2022-07-25T12:00:39.000000Z'
                ]
            ]);
    }

    public function test_update_template()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $store = Store::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/stores/' . $store->id . '/template-version')
            ->assertStatus(200);
    }

    public function test_store_orders()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $store = Store::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/stores/' . $store->id . '/sales')
            ->assertStatus(200);
    }

    public function test_store_logs()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $store = Store::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/stores/' . $store->id . '/logs')
            ->assertStatus(200);
    }
}
