<?php

namespace App\Exceptions\Store;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class StoreUrlExistsException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }

    public function error(): string
    {
        return trans('exception.store_url_already_exists.message');
    }
}
