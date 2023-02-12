<?php

namespace App\Exceptions\Payment;

use App\Exceptions\ApplicationException;
use Illuminate\Http\Response;

class InvalidCountryException extends ApplicationException
{
    private $country;

    public function __construct($country)
    {
        $this->country = $country;
    }

    public function status(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }

    public function error(): string
    {
        $replacement = [
            'country' => $this->country
        ];

        return trans('exception.invalid_country_exception.message', $replacement);
    }
}
