<?php

namespace App\Exceptions\Product;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class ItemAlreadyExistException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public function error(): string
    {
        return trans('exception.item_already_exist.message');
    }
}
