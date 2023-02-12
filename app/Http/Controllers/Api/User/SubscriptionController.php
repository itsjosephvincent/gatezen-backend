<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\SubscriptionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $subscriptionService;

    public function __construct(SubscriptionServiceInterface $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->subscriptionService->findSubscriptions($request)->response();
    }

    public function show($subscriptionId): JsonResponse
    {
        return $this->subscriptionService->findSubscription($subscriptionId)->response();
    }
}
