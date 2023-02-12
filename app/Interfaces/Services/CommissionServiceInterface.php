<?php

namespace App\Interfaces\Services;

interface CommissionServiceInterface
{
    public function findCommissions(object $payload);
    public function getTotalCommissionAmount();
    public function findStoreOwnerCommissions(object $payload);
    public function findCommission(int $commissionId);
    public function updateCommission(object $payload, int $commissionId);
}
