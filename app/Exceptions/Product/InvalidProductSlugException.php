<?php

namespace App\Exceptions\Product;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class InvalidProductSlugException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_NOT_FOUND;
    }

    public function error(): string
    {
        return trans('exception.invalid_product_slug.message');
    }
}
