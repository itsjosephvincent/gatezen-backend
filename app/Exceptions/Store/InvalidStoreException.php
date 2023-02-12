<?php

namespace App\Exceptions\Store;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class InvalidStoreException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_NOT_FOUND;
    }

    public function error(): string
    {
        return trans('exception.store_does_not_exist.message');
    }
}
