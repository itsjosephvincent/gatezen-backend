<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\StoreCategory;
use Tests\TestCase;
use Faker\Factory as Faker;

class BlogTest extends TestCase
{
    public function test_get_all_blogs()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/blogs')
            ->assertStatus(200);
    }

    public function test_get_blog_by_id()
    {
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $blog = Blog::take(1)->first();

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('GET', 'api/admin/blogs/' . $blog->id)
            ->assertStatus(200);
    }

    public function test_update_blog()
    {
        $this->faker = Faker::create();
        $admin = Admin::take(1)->first();
        $token = $admin->createToken('token-name');
        $blog = Blog::take(1)->first();
        $storeCategory = StoreCategory::take(1)->first();
        $blogCategory = BlogCategory::take(1)->first();

        $payload = [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'store_category_id' => $storeCategory->id,
            'blog_category_id' => $blogCategory->id
        ];

        $this->withHeader('Authorization', 'Bearer ' . $token->plainTextToken)
            ->json('PUT', 'api/admin/blogs/' . $blog->id, $payload)
            ->assertStatus(200);
    }
}
