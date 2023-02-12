<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogImageUpdateRequest;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Interfaces\Services\BlogServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->blogService->findBlogs($request)->response();
    }

    public function store(BlogStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'content',
            'store_category_id',
            'blog_category_id',
            'thumbnail_url',
        ]);

        return $this->blogService->createBlog($payload)->response();
    }

    public function show($blogId): JsonResponse
    {
        return $this->blogService->findBlog($blogId)->response();
    }

    public function update(BlogUpdateRequest $request, $blogId): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'content',
            'store_category_id',
            'blog_category_id'
        ]);

        return $this->blogService->updateBlog($payload, $blogId)->response();
    }

    public function updateBlogImage(BlogImageUpdateRequest $request, $blogId): JsonResponse
    {
        $payload = (object) $request->only([
            'thumbnail_url'
        ]);

        return $this->blogService->updateBlogPhoto($payload, $blogId)->response();
    }

    public function destroy($blogId)
    {
        $this->blogService->deleteBlog($blogId);
    }
}
