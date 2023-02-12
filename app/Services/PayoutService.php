<?php

namespace App\Services;

use App\Exceptions\Payout\InvalidPayoutRequestException;
use App\Exceptions\Payout\InvalidPayoutUpdateException;
use App\Http\Resources\PayoutDetailsResource;
use App\Http\Resources\PayoutResource;
use App\Interfaces\Repositories\CommissionRepositoryInterface;
use App\Interfaces\Repositories\PayoutRepositoryInterface;
use App\Interfaces\Repositories\PayoutSettingsRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Services\PayoutServiceInterface;
use App\Interfaces\Services\PayoutSettingsServiceInterface;
use App\Repositories\UserBankDetailsRepository;
use App\Traits\SortingTraits;

class PayoutService implements PayoutServiceInterface
{
    use SortingTraits;

    private $payoutRepository;
    private $commissionRepository;
    private $userBankDetailsRepository;
    private $productRepository;
    private $payoutSettingsService;

    public function __construct(
        PayoutRepositoryInterface $payoutRepository,
        CommissionRepositoryInterface $commissionRepository,
        UserBankDetailsRepository $userBankDetailsRepository,
        ProductRepositoryInterface $productRepository,
        PayoutSettingsServiceInterface $payoutSettingsService
    ) {
        $this->payoutRepository = $payoutRepository;
        $this->commissionRepository = $commissionRepository;
        $this->userBankDetailsRepository = $userBankDetailsRepository;
        $this->productRepository = $productRepository;
        $this->payoutSettingsService = $payoutSettingsService;
    }

    public function findPayouts($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'desc');

        $payout = $this->payoutRepository->findMany($payload, $sortField, $sortOrder);

        return PayoutResource::collection($payout);
    }

    public function findPayoutsByStoreOwner($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'desc');

        $payout = $this->payoutRepository->findManyByStoreOWner($payload, $sortField, $sortOrder);

        return PayoutResource::collection($payout);
    }

    public function findPayout($payoutId)
    {
        $payout = $this->payoutRepository->findOneById($payoutId);
        $commissions = $this->commissionRepository->findOneByPayoutId($payoutId);

        $data = (object) [
            'payout' => $payout,
            'commission' => $commissions
        ];

        return new PayoutDetailsResource($data);
    }

    public function createPayout($userBankDetailsId)
    {
        $commissions = $this->commissionRepository->getUnpaidTotalCommission();
        $minPayout = $this->payoutSettingsService->findMinPayoutValue();

        $amount = 0;
        foreach ($commissions as $commission) {
            $amount += $commission->amount;
        }

        if ($amount < $minPayout->min_amount) {
            throw new InvalidPayoutRequestException();
        }

        $userBankDetails = $this->userBankDetailsRepository->findOneById($userBankDetailsId);
        $payout = $this->payoutRepository->create($userBankDetails, $amount);

        foreach ($commissions as $commission) {
            $this->commissionRepository->updatePayoutId($payout->id, $commission->id);
        }

        return new PayoutResource($payout);
    }

    public function updatePayoutInternalNote($payload, $payoutId)
    {
        $payout = $this->payoutRepository->updateInternalNote($payload, $payoutId);

        return new PayoutResource($payout);
    }

    public function updatePayoutStatus($payload, $payoutId)
    {
        $payout = $this->payoutRepository->updateStatus($payload, $payoutId);

        return new PayoutResource($payout);
    }

    public function updateStoreOwnerPayout($payload, $payoutId)
    {
        $payout = $this->payoutRepository->findOneById($payoutId);

        if ($payout->payout_status != 'new') {
            throw new InvalidPayoutUpdateException();
        } else {
            $bankDetails = (object) [
                'account_number' => $payload->account_number,
                'account_name' => $payload->account_name,
                'bank_name' => $payload->bank_name,
                'bank_swift_code' => $payload->bank_swift_code
            ];

            $payout = $this->payoutRepository->updateByStoreOwner($bankDetails, $payoutId);

            return new PayoutResource($payout);
        }
    }
}
