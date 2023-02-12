<?php

namespace App\Exceptions\Cart;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class EmptyCartException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }

    public function error(): string
    {
        return trans('exception.empty_cart_exception.message');
    }
}
