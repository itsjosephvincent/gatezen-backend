<?php

namespace App\Interfaces\Services;

interface UserBankDetailsServiceInterface
{
    public function findUserBankDetails(object $payload);
    public function findUserBankDetailsList(object $payload);
    public function findUserBankDetail(int $userBankDetailsId);
    public function createUserBankDetails(object $payload);
    public function updateUserBankDetails(object $payload, int $userBankDetailsId);
    public function deleteUserBankDetails(int $userBankDetailsId);
}
