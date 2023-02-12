<?php

namespace App\Http\Controllers\Api\TheGateIndex;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowTgiUserBalanceRequest;
use App\Http\Requests\ShowTgiUserRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\Services\AuthServiceInterface;
use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Http\Request;

class TgiController extends Controller
{
    private $userService;
    private $authService;

    public function __construct(UserServiceInterface $userService, AuthServiceInterface $authService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }

    public function store(UserRequest $request)
    {
        $payload = $request->only([
            'first_name',
            'last_name',
            'email',
            'mobile',
            'password',
            'address',
            'street',
            'city',
            'postal',
            'country',
            'tgi_user_id',
            'tgi_referral_code',
            'company_name',
            'company_registration_number',
            'company_address',
            'euro_in_tokens',
            'euro_in_shares',
            'partner_role_name',
            'created_on_date',
            'portal_id',
            'portal_name',
            'role_id',
            'is_partnership_paid',
            'account_type'
        ]);

        return $this->userService->createUserFromTgiRegister($payload);
    }

    public function showTgiUser(ShowTgiUserRequest $request)
    {
        $payload = $request->only([
            'token',
            'tgi_user_id',
            'tgi_portal_id'
        ]);

        return $this->userService->findTgiUser($payload);
    }

    public function showTgiUserBalance(ShowTgiUserBalanceRequest $request)
    {
        $payload = $request->only([
            'token',
            'tgi_user_id',
            'tgi_portal_id'
        ]);

        return $this->userService->findUserBalance($payload);
    }

    public function tgiAuthentication(Request $request)
    {
        return $this->authService->loginFromTgi($request);
    }
}
