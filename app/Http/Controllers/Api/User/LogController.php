<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\LogServiceInterface;
use Illuminate\Http\JsonResponse;

class LogController extends Controller
{
    private $logService;

    public function __construct(LogServiceInterface $logService)
    {
        $this->logService = $logService;
    }

    public function getStoreLogsPerUser(Request $request): JsonResponse
    {
        return $this->logService->findUserLogs($request)->response();
    }
}
