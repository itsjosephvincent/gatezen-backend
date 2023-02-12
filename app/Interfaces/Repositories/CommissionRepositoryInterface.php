<?php

namespace App\Interfaces\Repositories;

interface CommissionRepositoryInterface
{
    public function findMany(object $payload, string $sortField,  string $sortOrder);
    public function findMonthlyCommission(int $userId);
    public function getUnpaidTotalCommission();
    public function getUnpaidTotalCommissionTgi(int $userId);
    public function findManyByStoreOwner(object $payload, string $sortField, string $sortOrder);
    public function create(int $orderDetailId, int $orderDetailPrice, object $user);
    public function findOneById(int $commissionId);
    public function findOneByPayoutId(int $payoutId);
    public function findOneByOrderDetailId(int $orderDetailId);
    public function update(object $payload, int $commissionId);
    public function updatePayoutId(int $payoutId, int $commissionId);
}
