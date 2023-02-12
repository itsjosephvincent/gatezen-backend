<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserBankDetailsRepositoryInterface;
use App\Models\UserBankDetail;

class UserBankDetailsRepository implements UserBankDetailsRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return UserBankDetail::with('user')
            ->where('user_id', $userId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyList($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return UserBankDetail::with('user')
            ->where('user_id', $userId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->get();
    }

    public function findOneById($userBankDetailsId)
    {
        return UserBankDetail::findOrFail($userBankDetailsId);
    }

    public function create($payload)
    {
        $userId = auth()->user()->id;

        $userBankDetails = new UserBankDetail();
        $userBankDetails->user_id = $userId;
        $userBankDetails->account_number = $payload->account_number;
        $userBankDetails->account_name = $payload->account_name;
        $userBankDetails->bank_name = $payload->bank_name;
        $userBankDetails->bank_swift_code = $payload->bank_swift_code;
        $userBankDetails->save();

        return $userBankDetails->fresh();
    }

    public function update($payload, $userBankDetailsId)
    {
        $userBankDetails = UserBankDetail::findOrFail($userBankDetailsId);
        $userBankDetails->account_number = $payload->account_number;
        $userBankDetails->account_name = $payload->account_name;
        $userBankDetails->bank_name = $payload->bank_name;
        $userBankDetails->bank_swift_code = $payload->bank_swift_code;
        $userBankDetails->save();

        return $userBankDetails->fresh();
    }

    public function delete($userBankDetailsId)
    {
        return UserBankDetail::findOrFail($userBankDetailsId)->delete();
    }
}
