<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
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

    public function show($blogSlug): JsonResponse
    {
        return $this->blogService->findBlogSlug($blogSlug)->response();
    }
}
