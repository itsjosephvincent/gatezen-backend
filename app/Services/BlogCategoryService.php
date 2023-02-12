<?php

namespace App\Services;

use App\Http\Resources\BlogCategoryResource;
use App\Interfaces\Repositories\BlogCategoryRepositoryInterface;
use App\Interfaces\Services\BlogCategoryServiceInterface;

class BlogCategoryService implements BlogCategoryServiceInterface
{
    private $blogCategoryRepository;

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    public function findBlogs()
    {
        $blog = $this->blogCategoryRepository->findMany();

        return BlogCategoryResource::collection($blog);
    }
}
