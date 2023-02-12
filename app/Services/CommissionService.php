<?php

namespace App\Services;

use App\Http\Resources\CommissionResource;
use App\Http\Resources\TotalCommissionAmountResource;
use App\Interfaces\Repositories\CommissionRepositoryInterface;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Services\CommissionServiceInterface;
use App\Traits\SortingTraits;

class CommissionService implements CommissionServiceInterface
{
    use SortingTraits;

    private $commissionRepository;
    private $orderRepository;

    public function __construct(
        CommissionRepositoryInterface $commissionRepository,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->commissionRepository = $commissionRepository;
        $this->orderRepository = $orderRepository;
    }

    public function findCommissions($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $commission = $this->commissionRepository->findMany($payload, $sortField, $sortOrder);

        return CommissionResource::collection($commission);
    }

    public function getTotalCommissionAmount()
    {
        $commissions = $this->commissionRepository->getUnpaidTotalCommission();

        $totalCommission = 0;
        foreach ($commissions as $commission) {
            $totalCommission += $commission->amount;
        }

        $data = (object) [
            'total_amount' => round($totalCommission, 2),
            'commissions' => count($commissions)
        ];

        return new TotalCommissionAmountResource($data);
    }

    public function findStoreOwnerCommissions($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $commission = $this->commissionRepository->findManyByStoreOwner($payload, $sortField, $sortOrder);

        return CommissionResource::collection($commission);
    }

    public function findCommission($commissionId)
    {
        $commission = $this->commissionRepository->findOneById($commissionId);
        $order = $this->orderRepository->findOneById($commission->commissionable_id);

        return new CommissionResource($order);
    }

    public function updateCommission($payload, $commissionId)
    {
        $commission = $this->commissionRepository->update($payload, $commissionId);

        return new CommissionResource($commission);
    }
}
