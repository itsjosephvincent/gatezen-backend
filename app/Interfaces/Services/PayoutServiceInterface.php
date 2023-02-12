<?php

namespace App\Interfaces\Services;

interface PayoutServiceInterface
{
    public function findPayouts(object $payload);
    public function findPayoutsByStoreOwner(object $payload);
    public function findPayout(int $payoutId);
    public function createPayout(int $userBankDetailsId);
    public function updatePayoutInternalNote(object $payload, int $payoutId);
    public function updatePayoutStatus(object $payload, int $payoutId);
    public function updateStoreOwnerPayout(object $payload, int $payoutId);
}
