<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\BlogCategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class BlogCategoryController extends Controller
{
    private $blogCategoryService;

    public function __construct(BlogCategoryServiceInterface $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    public function blogListWithoutPagination(): JsonResponse
    {
        return $this->blogCategoryService->findBlogs()->response();
    }
}
