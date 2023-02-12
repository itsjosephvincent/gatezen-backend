<?php

namespace App\Exceptions\Token;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class TokenNotFoundException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public function error(): string
    {
        return trans('exception.token_not_found.message');
    }
}
