<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\UserSubscriptionServiceInterface;
use Illuminate\Http\JsonResponse;

class UserSubscriptionController extends Controller
{
    private $userSubscriptionService;

    public function __construct(UserSubscriptionServiceInterface $userSubscriptionService)
    {
        $this->userSubscriptionService = $userSubscriptionService;
    }

    public function index(): JsonResponse
    {
        return $this->userSubscriptionService->findStoreOwnerSubscription()->response();
    }
}
