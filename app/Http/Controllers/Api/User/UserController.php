<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShowTgiUserBalanceRequest;
use App\Http\Requests\ShowTgiUserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserImageUpdateRequest;
use App\Http\Requests\UserStatusUpdateRequest;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->userService->findUsers($request)->response();
    }

    public function show($userId): JsonResponse
    {
        return $this->userService->findUser($userId)->response();
    }

    public function getStoreUserStores(Request $request, $userId): JsonResponse
    {
        return $this->userService->findStoresByStoreOwner($request, $userId)->response();
    }

    public function update(UserUpdateRequest $request, $userId): JsonResponse
    {
        $payload = $request->only([
            'first_name',
            'last_name',
            'email',
            'mobile',
            'birthdate',
        ]);

        return $this->userService->updateUser($payload, $userId)->response();
    }

    public function updateUserStatus(UserStatusUpdateRequest $request, $userId): JsonResponse
    {
        $payload = (object) $request->only([
            'is_active'
        ]);

        return $this->userService->updateUserStatus($payload, $userId)->response();
    }

    public function updateUserPassword(UserPasswordUpdateRequest $request, $userId): JsonResponse
    {
        $payload = (object) $request->only([
            'current_password',
            'password'
        ]);

        return $this->userService->updateUserPassword($payload, $userId)->response();
    }

    public function updateImage(UserImageUpdateRequest $request, $userId): JsonResponse
    {
        $payload = (object) $request->only([
            'img_url'
        ]);

        return $this->userService->updateUserImage($payload, $userId)->response();
    }

    public function disableGoogle2FAStatus($userId): JsonResponse
    {
        return $this->userService->disableUser2FAStatusData($userId)->response();
    }
}
