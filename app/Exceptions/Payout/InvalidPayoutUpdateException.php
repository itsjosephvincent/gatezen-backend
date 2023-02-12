<?php

namespace App\Exceptions\Payout;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class InvalidPayoutUpdateException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_FORBIDDEN;
    }

    public function error(): string
    {
        return trans('exception.invalid_payout_update.message');
    }
}
