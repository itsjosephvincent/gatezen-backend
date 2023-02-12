<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthRequest;
use App\Http\Requests\UserAuthRequest;
use App\Interfaces\Services\AuthServiceInterface;
use App\Models\Store;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function adminAuthenticationByPassword(AdminAuthRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'email',
            'password',
            'verification_code'
        ]);

        return $this->authService->authenticateAdmin($payload)->response();
    }

    public function userAuthenticationByPassword(UserAuthRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'email',
            'password',
            'verification_code',
        ]);

        return $this->authService->authenticateUser($payload)->response();
    }

    public function customerAuthenticationByPassword(AuthRequest $request, Store $store): JsonResponse
    {
        $payload = (object) $request->only([
            'email',
            'password',
            'verification_code',
        ]);

        return $this->authService->authenticateCustomer($payload, $store)->response();
    }

    public function tgiAuthentication(Request $request)
    {
        return $this->authService->loginFromTgi($request);
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }

    public function csrf()
    {
        return csrf_token();
    }
}
