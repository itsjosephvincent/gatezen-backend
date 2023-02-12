<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Models\Blog;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BlogRepository implements BlogRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchStoreCategory = $payload->store_category;
        $searchBlogCategory = $payload->blog_category;
        return Blog::with([
            'store_category',
            'blog_category'
        ])->filter($payload->all())
            ->when($searchStoreCategory !== null, function ($query) use ($searchStoreCategory) {
                $query->whereHas(
                    'store_category',
                    function ($query) use ($searchStoreCategory) {
                        $query->where('name', 'like', $searchStoreCategory . '%');
                    }
                );
            })
            ->when($searchBlogCategory !== null, function ($query) use ($searchBlogCategory) {
                $query->whereHas(
                    'blog_category',
                    function ($query) use ($searchBlogCategory) {
                        $query->where('name', 'like', $searchBlogCategory . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyByStoreCategory($payload, $storeCategoryId, $sortField, $sortOrder)
    {
        return Blog::with([
            'store_category',
            'blog_category'
        ])->where('store_category_id', $storeCategoryId)->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($payload)
    {
        $blog = new Blog();
        $blog->thumbnail_url = '';
        $blog->title = $payload->title;
        $blog->content = $payload->content;
        $blog->store_category_id = $payload->store_category_id;
        $blog->blog_category_id = $payload->blog_category_id;
        $blog->save();
        $insertMedia = Blog::findOrFail($blog->id);
        $insertMedia->addMediaFromRequest('thumbnail_url')->toMediaCollection('blog_media');
        $insertMedia->thumbnail_url = $insertMedia->getMedia('blog_media')->last()->getUrl();
        $insertMedia->save();

        return $blog->fresh();
    }

    public function findOneById($blogId)
    {
        return Blog::with([
            'store_category',
            'blog_category'
        ])->findOrFail($blogId);
    }

    public function findOneBySlug($blogSlug)
    {
        return Blog::with([
            'store_category',
            'blog_category'
        ])->where('slug', $blogSlug)->first();
    }

    public function update($payload, $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->title = $payload->title;
        $blog->content = $payload->content;
        $blog->store_category_id = $payload->store_category_id;
        $blog->blog_category_id = $payload->blog_category_id;
        $blog->save();

        return $blog->fresh();
    }

    public function updatePhoto($payload, $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $media = Media::where('model_id', $blog->id)->where('model_type', 'App\Models\Blog')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $blog->addMediaFromRequest('thumbnail_url')->toMediaCollection('blog_media');
        $blog->thumbnail_url = $blog->getMedia('blog_media')->last()->getUrl();
        $blog->save();

        return $blog->fresh();
    }

    public function delete($blogId)
    {
        return Blog::findOrFail($blogId)->delete();
    }
}
