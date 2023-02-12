<?php

namespace App\Http\Controllers\Api\User;

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
        return $this->commissionService->findStoreOwnerCommissions($request)->response();
    }

    public function getTotalCommission()
    {
        return $this->commissionService->getTotalCommissionAmount();
    }
}
