<?php

namespace App\Exceptions\User;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class UserDoesNotExistException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_NOT_FOUND;
    }

    public function error(): string
    {
        return trans('exception.user_does_not_exist.message');
    }
}
