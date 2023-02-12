<?php

namespace Tests\Feature\User;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\StoreCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class FaqTest extends TestCase
{
    public function test_get_all_faq()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/faqs')
            ->assertStatus(200);
    }

    public function test_create_new_faq()
    {
        $this->faker = Faker::create();
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $storeCategory = StoreCategory::take(1)->first();
        $faqCategory = FaqCategory::take(1)->first();

        $payload = [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'store_category_id' => $storeCategory->id,
            'faq_category_id' => $faqCategory->id
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('POST', 'api/user/faqs', $payload)
            ->assertStatus(200);
    }

    public function test_show_faq()
    {
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $faq = Faq::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/user/faqs/' . $faq->id)
            ->assertStatus(200);
    }

    public function test_update_faq()
    {
        $this->faker = Faker::create();
        $user = User::take(1)->first();
        $token = $user->createToken('token-name');
        $storeCategory = StoreCategory::take(1)->first();
        $faqCategory = FaqCategory::take(1)->first();
        $faq = Faq::take(1)->first();

        $payload = [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'store_category_id' => $storeCategory->id,
            'faq_category_id' => $faqCategory->id
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/user/faqs/' . $faq->id, $payload)
            ->assertStatus(200);
    }
}
