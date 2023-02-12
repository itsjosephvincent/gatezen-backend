<?php

namespace App\Exceptions\Filter;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class InvalidFIlterException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public function error(): string
    {
        return trans('exception.invalid_filter.message');
    }
}
