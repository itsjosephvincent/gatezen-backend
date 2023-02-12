<?php

namespace App\Interfaces\Repositories;

interface PayoutRepositoryInterface
{
    public function findMany(object $payload, string $sortField,  string $sortOrder);
    public function findManyByStoreOWner(object $payload, string $sortField, string $sortOrder);
    public function create(object $userBankDetails, $amount);
    public function findTotalPayout(int $userId);
    public function updateInternalNote(object $payload, int $payoutId);
    public function findOneById(int $payoutId);
    public function updateStatus(object $payload, int $payoutId);
    public function updateByStoreOwner(object $bankDetails, int $payoutId);
}
