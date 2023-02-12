<?php

namespace App\Interfaces\Services;

interface BlogServiceInterface
{
    public function findBlogs(object $payload);
    public function findStoreCategoryBlogs(object $payload);
    public function createBlog(object $payload);
    public function findBlog(int $blogId);
    public function findBlogSlug(string $blogSlug);
    public function updateBlog(object $payload, int $blogId);
    public function updateBlogPhoto(object $payload, int $blogId);
    public function deleteBlog(int $blogId);
}
