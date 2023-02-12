<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanStoreRequest;
use App\Interfaces\Services\PlanServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $planService;

    public function __construct(PlanServiceInterface $planService)
    {
        $this->planService = $planService;
    }


    public function index(Request $request): JsonResponse
    {
        return $this->planService->findPlans($request)->response();
    }

    public function plans(Request $request): JsonResponse
    {
        return $this->planService->allPlans($request)->response();
    }

    public function store(PlanStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'key',
            'commission'
        ]);

        return $this->planService->createPlan($payload)->response();
    }

    public function show($planId): JsonResponse
    {
        return $this->planService->findPlan($planId)->response();
    }

    public function update(PlanStoreRequest $request, $planId): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'key',
            'commission'
        ]);

        return $this->planService->updatePlan($payload, $planId)->response();
    }
}
