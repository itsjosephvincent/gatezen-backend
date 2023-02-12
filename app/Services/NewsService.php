<?php

namespace App\Services;

use App\Exceptions\Blog\InvalidNewsSlugException;
use App\Http\Resources\NewsResource;
use App\Interfaces\Services\NewsServiceInterface;
use App\Traits\SortingTraits;

class NewsService implements NewsServiceInterface
{
    use SortingTraits;

    public function findNews()
    {
        $news = config('news');

        return NewsResource::collection($news);
    }

    public function findOneById($slug)
    {
        $news = config('news');

        for ($i = 0; $i < count(config('news')); $i++) {
            if ($news[$i]['slug'] == $slug) {
                return new NewsResource($news[$i]);
            }
        }

        throw new InvalidNewsSlugException();
    }
}
