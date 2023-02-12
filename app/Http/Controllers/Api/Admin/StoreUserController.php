<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\StoreUserUpdateRequest;
use App\Interfaces\Services\StoreUserServiceInterface;
use Illuminate\Http\JsonResponse;

class StoreUserController extends Controller
{
    private $storeUserService;

    public function __construct(StoreUserServiceInterface $storeUserService)
    {
        $this->storeUserService = $storeUserService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->storeUserService->findUsers($request)->response();
    }

    public function show($userId): JsonResponse
    {
        return $this->storeUserService->findUser($userId)->response();
    }

    public function update(StoreUserUpdateRequest $request, $userId): JsonResponse
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'email',
            'mobile',
            'birthdate'
        ]);

        return $this->storeUserService->updateUser($payload, $userId)->response();
    }

    public function updatePassword(PasswordUpdateRequest $request, $userId): JsonResponse
    {
        $payload = (object) $request->only([
            'password',
        ]);

        return $this->storeUserService->updateUserPassword($payload, $userId)->response();
    }

    public function disableUser2FA($userId): JsonResponse
    {
        return $this->storeUserService->disableUser2FA($userId)->response();
    }
}
