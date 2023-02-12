<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\DashboardServiceInterface;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    private $dashboardService;

    public function __construct(DashboardServiceInterface $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(): JsonResponse
    {
        return $this->dashboardService->getAdminDashboardData()->response();
    }
}
