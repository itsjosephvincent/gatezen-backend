<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSubscriptionStoreRequest;
use App\Http\Requests\UserSubscriptionUpdateRequest;
use App\Interfaces\Services\UserSubscriptionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserSubscriptionController extends Controller
{
    private $userSubscriptionService;

    public function __construct(UserSubscriptionServiceInterface $userSubscriptionService)
    {
        $this->userSubscriptionService = $userSubscriptionService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->userSubscriptionService->findUserSubscriptions($request)->response();
    }

    public function store(UserSubscriptionStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'plan_id',
            'user_id'
        ]);

        return $this->userSubscriptionService->createUserSubscription($payload)->response();
    }

    public function show($userSubscriptionId): JsonResponse
    {
        return $this->userSubscriptionService->findUserSubscription($userSubscriptionId)->response();
    }

    public function update(UserSubscriptionUpdateRequest $request, $userId): JsonResponse
    {
        return $this->userSubscriptionService->updateUserSubscription($request->plan_id, $userId)->response();
    }
}
