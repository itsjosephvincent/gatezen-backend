<?php

namespace Tests\Feature\User;

use App\Models\Store;
use Faker\Factory as Faker;
use App\Models\StoreCategory;
use App\Models\Template;
use App\Models\User;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function test_user_store_list()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/stores')
            ->assertStatus(200);
    }

    public function test_create_new_store()
    {
        $this->faker = Faker::create();
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $template = Template::all()->random()->id;
        $storeCategory = StoreCategory::all()->random()->id;

        $templateId = $template;
        $storeCategoryId = $storeCategory;
        $url = $this->faker->url();
        $storeName = $this->faker->word();

        $payload = [
            'template_id' => $templateId,
            'store_category_id' => $storeCategoryId,
            'url' => $url,
            'store_name' => $storeName
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/stores', $payload)
            ->assertStatus(200);
    }

    public function test_get_store_by_id()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $storeId = Store::all()->random()->id;

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/stores/' . $storeId)
            ->assertStatus(200);
    }

    public function test_update_store()
    {
        $this->faker = Faker::create();
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $store = Store::take(1)->first();

        $storeName = $this->faker->word();
        $private = $this->faker->boolean();

        $payload = [
            'store_name' => $storeName,
            'is_private' => $private,
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/stores/' . $store->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $store->id,
                    'template_id' => $store->template_id,
                    'store_category_id' => $store->store_category_id,
                    'url' => $store->url,
                    'store_name' => $storeName,
                    'status' => $store->status,
                    'is_private' => $private,
                    'is_wholesaler' => $store->is_wholesaler,
                    'theme_color' => $store->theme_color,
                    'text_color' => $store->text_color,
                    'template_version' => $store->template_version,
                    'created_at' => '2022-07-25T12:00:39.000000Z'
                ]
            ]);
    }

    public function test_update_store_template()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $storeId = Store::all()->random()->id;

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/stores/' . $storeId . '/template-version')
            ->assertStatus(200);
    }
}
