<?php

namespace App\Exceptions\Zoho;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class CustomerAlreadyExistException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }

    public function error(): string
    {
        return trans('exception.customer_already_exist.message');
    }
}
