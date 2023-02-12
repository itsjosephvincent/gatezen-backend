<?php

namespace App\Exceptions\Store;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class StoreExistsException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public function error(): string
    {
        return trans('exception.store_already_exist.message');
    }
}
