<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CommissionRepositoryInterface;
use App\Models\Commission;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommissionRepository implements CommissionRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchUser = $payload->user;
        $searchOrderNumber = $payload->order_number;
        return Commission::with([
            'user',
            'payout',
            'commissionable.order'
        ])->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->when($searchUser !== null, function ($query) use ($searchUser) {
                $query->whereHas(
                    'user',
                    function ($query) use ($searchUser) {
                        $query->where('first_name', 'like', $searchUser . '%')
                            ->orWhere('last_name', 'like', $searchUser . '%');
                    }
                );
            })
            ->when($searchOrderNumber !== null, function ($query) use ($searchOrderNumber) {
                $query->whereHas(
                    'commissionable.order',
                    function ($query) use ($searchOrderNumber) {
                        $query->where('number', 'like', $searchOrderNumber . '%');
                    }
                );
            })
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findMonthlyCommission($userId)
    {
        return Commission::whereYear('created_at', date('Y'))->where('user_id', $userId)->select(
            DB::raw('
                IFNULL(SUM(CASE MONTH(created_at) WHEN 1 THEN commissions.amount END), 0) AS January,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 2 THEN commissions.amount END), 0) AS February,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 3 THEN commissions.amount END), 0) AS March,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 4 THEN commissions.amount END), 0) AS April,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 5 THEN commissions.amount END), 0) AS May,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 6 THEN commissions.amount END), 0) AS June,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 7 THEN commissions.amount END), 0) AS July,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 8 THEN commissions.amount END), 0) AS August,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 9 THEN commissions.amount END), 0) AS September,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 10 THEN commissions.amount END), 0) AS October,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 11 THEN commissions.amount END), 0) AS November,
                IFNULL(SUM(CASE MONTH(created_at) WHEN 12 THEN commissions.amount END), 0) AS December
            ')
        )->first();
    }

    public function getUnpaidTotalCommission()
    {
        $userId = auth()->user()->id;

        return Commission::where('user_id', $userId)
            ->whereNull('commissions.payout_id')
            ->get();
    }

    public function getUnpaidTotalCommissionTgi($userId)
    {
        return Commission::where('commissions.user_id', $userId)
            ->join('payouts', 'payouts.id', '=', 'commissions.payout_id')
            ->whereNull('payouts.paid_at')
            ->sum('commissions.amount');
    }

    public function findManyByStoreOwner($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return Commission::where('user_id', $userId)->with([
            'user',
            'payout'
        ])->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($orderDetailId, $orderDetailPrice, $user)
    {
        $halfOfSalesAmount = $orderDetailPrice * 0.50;
        $commissionAmount = $halfOfSalesAmount * $user->user_subscription->plan->commission;

        $commission = new Commission();
        $commission->user_id = $user->id;
        $commission->commissionable_type = 'App\Models\OrderDetail';
        $commission->commissionable_id = $orderDetailId;
        $commission->sales_amount = $orderDetailPrice;
        $commission->amount = $commissionAmount;
        $commission->save();

        return true;
    }

    public function findOneById($commissionId)
    {
        return Commission::with([
            'user',
            'payout'
        ])->findOrFail($commissionId);
    }

    public function findOneByPayoutId($payoutId)
    {
        return Commission::with([
            'commissionable.order',
            'commissionable.product.medias'
        ])->where('payout_id', $payoutId)->get();
    }

    public function findOneByOrderDetailId($orderDetailId)
    {
        return Commission::with([
            'user',
            'payout'
        ])->where('commissionable_type', 'App\Models\OrderDetail')
            ->where('commissionable_id', $orderDetailId)
            ->first();
    }

    public function update($payload, $commissionId)
    {
        $userId = auth()->user()->id;

        $commission = Commission::findOrFail($commissionId);
        $commission->approved_by = $userId;
        $commission->approved_at = Carbon::now();
        $commission->internal_note = $payload->internal_note;
        $commission->save();

        return $commission->fresh();
    }

    public function updatePayoutId($payoutId, $commissionId)
    {
        $commission = Commission::findOrFail($commissionId);
        $commission->payout_id = $payoutId;
        $commission->save();

        return $commission->fresh();
    }
}
