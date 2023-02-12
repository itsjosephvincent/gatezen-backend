<?php

namespace App\Repositories;

use App\Enum\PayoutStatus;
use App\Interfaces\Repositories\PayoutRepositoryInterface;
use App\Models\Payout;
use Carbon\Carbon;

class PayoutRepository implements PayoutRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchUser = $payload->name;
        return Payout::with([
            'user'
        ])->filter($payload->all())
            ->when($searchUser !== null, function ($query) use ($searchUser) {
                $query->whereHas(
                    'user',
                    function ($query) use ($searchUser) {
                        $query->where('first_name', 'like', $searchUser . '%')
                            ->orWhere('last_name', 'like', $searchUser . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyByStoreOWner($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return Payout::where('user_id', $userId)->with([
            'user'
        ])->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($userBankDetails, $amount)
    {
        $userId = auth()->user()->id;

        $payout = new Payout();
        $payout->user_id = $userId;
        $payout->amount = $amount;
        $payout->user_bank_details = json_encode($userBankDetails);
        $payout->save();

        return $payout->fresh();
    }

    public function findTotalPayout($userId)
    {
        return Payout::where('user_id', $userId)
            ->whereNotNull('paid_at')
            ->sum('amount');
    }

    public function updateInternalNote($payload, $payoutId)
    {
        $payout = Payout::findOrFail($payoutId);
        $payout->internal_note = $payload->internal_note;
        $payout->save();

        return $payout->fresh();
    }

    public function findOneById($payoutId)
    {
        return Payout::with('user')->findOrFail($payoutId);
    }

    public function updateStatus($payload, $payoutId)
    {
        $payout = Payout::findOrFail($payoutId);
        if ($payload->payout_status == PayoutStatus::Completed->value) {
            $payout->payout_status = $payload->payout_status;
            $payout->paid_at = Carbon::now();
            $payout->save();
        } else {
            $payout->payout_status = $payload->payout_status;
            $payout->save();
        }

        return $payout->fresh();
    }

    public function updateByStoreOwner($bankDetails, $payoutId)
    {
        $payout = Payout::findOrFail($payoutId);
        $payout->user_bank_details = json_encode($bankDetails);
        $payout->save();

        return $payout->fresh();
    }
}
