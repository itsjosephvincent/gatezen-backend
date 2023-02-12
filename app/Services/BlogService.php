<?php

namespace App\Services;

use App\Exceptions\Blog\InvalidBlogSlugException;
use App\Exceptions\Store\InvalidStoreException;
use App\Http\Resources\BlogResource;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Interfaces\Repositories\StoreCategoryRepositoryInterface;
use App\Interfaces\Services\BlogServiceInterface;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use Throwable;

class BlogService implements BlogServiceInterface
{
    use SortingTraits;

    private $blogRepository;
    private $storeCategoryRepository;

    public function __construct(BlogRepositoryInterface $blogRepository, StoreCategoryRepositoryInterface $storeCategoryRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->storeCategoryRepository = $storeCategoryRepository;
    }

    public function findBlogs($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $blogList = $this->blogRepository->findMany($payload, $sortField, $sortOrder);

        return BlogResource::collection($blogList);
    }

    public function findStoreCategoryBlogs($payload)
    {
        $storeCategory = $this->storeCategoryRepository->findOneByName($payload->store_category);

        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $blogList = $this->blogRepository->findManyByStoreCategory($payload, $storeCategory->id, $sortField, $sortOrder);

        return BlogResource::collection($blogList);
    }

    public function createBlog($payload)
    {
        DB::beginTransaction();
        try {
            $blog = $this->blogRepository->create($payload);
            DB::commit();

            return new BlogResource($blog);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function findBlog($blogId)
    {
        $blog = $this->blogRepository->findOneById($blogId);

        return new BlogResource($blog);
    }

    public function findBlogSlug($blogSlug)
    {
        $blog = $this->blogRepository->findOneBySlug($blogSlug);

        if (!$blog) {
            throw new InvalidBlogSlugException();
        }

        return new BlogResource($blog);
    }

    public function updateBlog($payload, $blogId)
    {
        $blog = $this->blogRepository->update($payload, $blogId);

        return new BlogResource($blog);
    }

    public function updateBlogPhoto($payload, $blogId)
    {
        DB::beginTransaction();

        try {
            $blog = $this->blogRepository->updatePhoto($payload, $blogId);
            DB::commit();

            return new BlogResource($blog);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function deleteBlog($blogId)
    {
        $this->blogRepository->delete($blogId);
    }
}
