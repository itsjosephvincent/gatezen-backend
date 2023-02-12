<?php

namespace App\Repositories;

use App\Interfaces\Repositories\NewsRepositoryInterface;
use App\Models\NewsHeadline;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NewsRepository implements NewsRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder)
    {
        return NewsHeadline::with('category')
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOne(int $newsId)
    {
        return NewsHeadline::findOrFail($newsId);
    }

    public function create(object $payload)
    {
        $news = new NewsHeadline();
        $news->title = $payload->title;
        $news->description = $payload->description;
        $news->save();

        return $news->fresh();
    }

    public function upload($img_url, $newsId)
    {
        $news = NewsHeadline::findOrFail($newsId);
        $media = Media::where('model_id', $news->id)->where('model_type', 'App\Models\NewsHeadline')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $news->addMediaFromRequest('img_url')->toMediaCollection('news_media');
        $news->image_url = $news->getMedia('news_media')->last()->getUrl();
        $news->save();
        return $news->fresh();
    }

    public function update(object $payload, int $newsId)
    {
        $news = NewsHeadline::findOrFail($newsId);
        $news->title = $payload->title;
        $news->description = $payload->description;
        $news->save();

        return $news->fresh();
    }

    public function delete(int $newsId)
    {
        NewsHeadline::findOrFail($newsId)->delete();

        return true;
    }
}
