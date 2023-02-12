<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\AdminUpdateStatusRequest;
use App\Http\Requests\AdminUpdatePasswordRequest;
use App\Interfaces\Services\AdminServiceInterface;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->adminService->findAdmins($request)->response();
    }

    public function store(AdminStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'birthdate',
            'gender',
            'email',
            'password',
        ]);

        return $this->adminService->createAdmin($payload)->response();
    }

    public function show($adminId): JsonResponse
    {
        return $this->adminService->findAdmin($adminId)->response();
    }

    public function update(AdminUpdateRequest $request, $adminId): JsonResponse
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'birthdate',
            'gender',
            'email',
        ]);

        return $this->adminService->updateAdmin($payload, $adminId)->response();
    }

    public function updateAdminStatus(AdminUpdateStatusRequest $request, $adminId): JsonResponse
    {
        $payload = (object) $request->only([
            'is_active',
        ]);

        return $this->adminService->updateAdminStatus($payload, $adminId)->response();
    }

    public function updateAdminPassword(AdminUpdatePasswordRequest $request, $adminId): JsonResponse
    {
        $payload = (object) $request->only([
            'password',
        ]);

        return $this->adminService->updateAdminPassword($payload, $adminId)->response();
    }
}
