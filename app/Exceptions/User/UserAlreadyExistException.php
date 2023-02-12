<?php

namespace App\Exceptions\User;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class UserAlreadyExistException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public function error(): string
    {
        return trans('exception.user_already_exist.message');
    }
}
