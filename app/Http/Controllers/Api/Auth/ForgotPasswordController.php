<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordVerificationRequest;
use App\Interfaces\Services\ForgotPasswordServiceInterface;
use App\Models\Store;

class ForgotPasswordController extends Controller
{
    private $forgotPasswordService;

    public function __construct(ForgotPasswordServiceInterface $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
    }

    public function adminForgotPass(ForgotPasswordRequest $request)
    {
        $payload = (object) $request->only([
            'email'
        ]);

        return $this->forgotPasswordService->adminForgotPass($payload);
    }

    public function adminResetPass(ResetPasswordRequest $request)
    {
        $payload = (object) $request->only([
            'password',
            'token'
        ]);

        return $this->forgotPasswordService->adminResetPass($payload);
    }

    public function userForgotPass(ForgotPasswordRequest $request)
    {
        $payload = (object) $request->only([
            'email'
        ]);

        return $this->forgotPasswordService->userForgotPass($payload);
    }

    public function userResetPass(ResetPasswordRequest $request)
    {
        $payload = (object) $request->only([
            'password',
            'token'
        ]);

        return $this->forgotPasswordService->userResetPass($payload);
    }

    public function customerForgotPass(ForgotPasswordRequest $request, Store $store)
    {
        $payload = (object) $request->only([
            'email'
        ]);

        return $this->forgotPasswordService->customerForgotPass($payload, $store);
    }

    public function customerResetPass(ResetPasswordRequest $request)
    {
        $payload = (object) $request->only([
            'password',
            'token'
        ]);

        return $this->forgotPasswordService->customerResetPass($payload);
    }

    public function resetPasswordVerification(ResetPasswordVerificationRequest $request)
    {
        $payload = (object) $request->only([
            'token'
        ]);

        return $this->forgotPasswordService->resetPasswordVerification($payload);
    }
}
