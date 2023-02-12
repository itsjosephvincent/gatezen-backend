<?php

namespace App\Exceptions\Payment;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class InvalidPaymentException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_PAYMENT_REQUIRED;
    }

    public function error(): string
    {
        return trans('exception.invalid_payment.message');
    }
}
