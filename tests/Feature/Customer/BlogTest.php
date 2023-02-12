<?php

namespace Tests\Feature\Customer;

use App\Models\Blog;
use Tests\TestCase;

class BlogTest extends TestCase
{
    public function test_customer_view_all_blogs()
    {
        $this->json('GET', 'api/customer/blogs')
            ->assertStatus(200);
    }

    public function test_customer_view_specific_blog()
    {
        $blog = Blog::take(1)->first();

        $this->json('GET', 'api/customer/blogs/' . $blog->slug)
            ->assertStatus(200);
    }
}
