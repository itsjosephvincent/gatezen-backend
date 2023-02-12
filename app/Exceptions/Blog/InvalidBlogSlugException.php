<?php

namespace App\Exceptions\Blog;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class InvalidBlogSlugException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_NOT_FOUND;
    }

    public function error(): string
    {
        return trans('exception.invalid_blog_slug.message');
    }
}
