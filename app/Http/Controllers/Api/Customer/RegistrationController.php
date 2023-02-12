<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\EmailVerificationRequest;
use App\Interfaces\Services\CustomerServiceInterface;
use App\Interfaces\Services\EmailVerificationServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    private $customerService;
    private $emailVerificationService;

    public function __construct(CustomerServiceInterface $customerService, EmailVerificationServiceInterface $emailVerificationService)
    {
        $this->customerService = $customerService;
        $this->emailVerificationService = $emailVerificationService;
    }

    public function index(CustomerRequest $request, Store $store): JsonResponse
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'email',
            'password'
        ]);

        return $this->customerService->createCustomer($payload, $store)->response();
    }

    public function emailVerify(EmailVerificationRequest $request)
    {
        return $this->emailVerificationService->verifyEmailData($request->token);
    }
}
