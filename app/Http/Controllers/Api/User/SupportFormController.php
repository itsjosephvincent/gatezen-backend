<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportFormRequest;
use App\Interfaces\Services\SupportFormServiceInterface;

class SupportFormController extends Controller
{
    private $supportFormService;

    public function __construct(SupportFormServiceInterface $supportFormService)
    {
        $this->supportFormService = $supportFormService;
    }

    public function sendSupportEmail(SupportFormRequest $request)
    {
        $payload = (object) $request->only([
            'subject',
            'inquiry'
        ]);

        return $this->supportFormService->sendSupportFormEmail($payload);
    }
}
