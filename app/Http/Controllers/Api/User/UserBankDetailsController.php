<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserBankDetailsStoreRequest;
use App\Http\Requests\UserBankDetailsUpdateRequest;
use App\Interfaces\Services\UserBankDetailsServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserBankDetailsController extends Controller
{
    private $userBankDetailsService;

    public function __construct(UserBankDetailsServiceInterface $userBankDetailsService)
    {
        $this->userBankDetailsService = $userBankDetailsService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->userBankDetailsService->findUserBankDetails($request)->response();
    }

    public function getAllUserBankDetails(Request $request): JsonResponse
    {
        return $this->userBankDetailsService->findUserBankDetailsList($request)->response();
    }

    public function store(UserBankDetailsStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'account_number',
            'account_name',
            'bank_name',
            'bank_swift_code'
        ]);

        return $this->userBankDetailsService->createUserBankDetails($payload)->response();
    }

    public function show($userBankDetailsId): JsonResponse
    {
        return $this->userBankDetailsService->findUserBankDetail($userBankDetailsId)->response();
    }

    public function update(UserBankDetailsUpdateRequest $request, $userBankDetailsId): JsonResponse
    {
        $payload = (object) $request->only([
            'account_number',
            'account_name',
            'bank_name',
            'bank_swift_code'
        ]);

        return $this->userBankDetailsService->updateUserBankDetails($payload, $userBankDetailsId)->response();
    }

    public function destroy($userBankDetailsId)
    {
        $this->userBankDetailsService->deleteUserBankDetails($userBankDetailsId);
    }
}
