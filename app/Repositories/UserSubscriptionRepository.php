<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserSubscriptionsRepositoryInterface;
use App\Models\UserSubscription;

class UserSubscriptionRepository implements UserSubscriptionsRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        return UserSubscription::with([
            'user',
            'plan'
        ])->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOwnerSubscription()
    {
        $userId = auth()->user()->id;

        return UserSubscription::with([
            'user',
            'plan'
        ])->where('user_id', $userId)
            ->first();
    }

    public function findSubscription($userId)
    {
        return UserSubscription::with([
            'user',
            'plan'
        ])->where('user_id', $userId)
            ->first();
    }

    public function create($payload)
    {
        $userSubscription = new UserSubscription();
        $userSubscription->plan_id = $payload->plan_id;
        $userSubscription->user_id = $payload->user_id;
        $userSubscription->save();

        return $userSubscription->fresh();
    }

    public function findOneById($userSubscriptionId)
    {
        return UserSubscription::findOrFail($userSubscriptionId);
    }

    public function update($userId, $planId)
    {
        $userSubscription = UserSubscription::where('user_id', $userId)->first();
        $userSubscription->plan_id = $planId;
        $userSubscription->save();

        return $userSubscription->fresh();
    }
}
