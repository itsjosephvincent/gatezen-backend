<?php

namespace Tests\Feature\Customer;

use App\Models\Faq;
use App\Models\StoreCategory;
use Tests\TestCase;

class FaqTest extends TestCase
{
    public function test_show_all_faq()
    {
        $this->json('GET', 'api/customer/faqs')
            ->assertStatus(200);
    }

    public function test_show_faq_by_id()
    {
        $faq = Faq::take(1)->first();

        $this->json('GET', 'api/customer/faqs/' . $faq->id)
            ->assertStatus(200);
    }

    public function test_show_faq_by_store_category()
    {
        $storeCategory = StoreCategory::take(1)->first();

        $payload = [
            'store_category' =>  $storeCategory->name
        ];

        $this->json('GET', 'api/customer/faqs-by-store-category', $payload)
            ->assertStatus(200);
    }
}
