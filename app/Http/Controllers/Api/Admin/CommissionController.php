<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\CommissionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    private $commissionService;

    public function __construct(CommissionServiceInterface $commissionService)
    {
        $this->commissionService = $commissionService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->commissionService->findCommissions($request)->response();
    }

    public function show($commissionId): JsonResponse
    {
        return $this->commissionService->findCommission($commissionId)->response();
    }

    public function update(Request $request, $commissionId): JsonResponse
    {
        return $this->commissionService->updateCommission($request, $commissionId)->response();
    }
}
