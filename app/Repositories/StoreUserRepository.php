<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Repositories\StoreUserRepositoryInterface;

class StoreUserRepository implements StoreUserRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchPlan = $payload->plan;
        $searchRole = $payload->role;
        $searchStore = $payload->store;
        $storeOwner = $payload->owner;
        return User::filter($payload->all())
            ->with([
                'stores_user',
                'stores_user.user',
                'stores_user.store',
                'roles',
                'user_subscription',
                'user_subscription.plan',
            ])->when($searchPlan !== null, function ($query) use ($searchPlan) {
                $query->whereHas(
                    'user_subscription.plan',
                    function ($query) use ($searchPlan) {
                        $query->where('name', 'like', $searchPlan . '%');
                    }
                );
            })->when($storeOwner !== null, function ($query) use ($storeOwner) {
                $query->whereHas(
                    'stores_user.user',
                    function ($query) use ($storeOwner) {
                        $query->where('first_name', 'like', $storeOwner . '%')
                            ->orWhere('last_name', 'like', $storeOwner . '%');
                    }
                );
            })
            ->when($searchRole !== null, function ($query) use ($searchRole) {
                $query->whereHas(
                    'roles',
                    function ($query) use ($searchRole) {
                        $query->where('name', 'like', str_replace(" ", "_", $searchRole) . '%');
                    }
                );
            })->when($searchStore !== null, function ($query) use ($searchStore) {
                $query->whereHas(
                    'stores_user.store',
                    function ($query) use ($searchStore) {
                        $query->where('store_name', 'like', $searchStore . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findManyStoreUsers($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return User::filter($payload->all())
            ->with([
                'store_user',
                'store_user.store',
                'roles',
                'user_subsription',
                'user_subscription.plan',
            ])->where('id', $userId)
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneById($userId)
    {
        return User::with(
            'user_subscription.plan'
        )->findOrFail($userId);
    }

    public function update($payload, $userId)
    {
        $user = User::findOrFail($userId);
        $user->first_name = $payload->first_name;
        $user->last_name = $payload->last_name;
        $user->email = $payload->email;
        $user->mobile = $payload->mobile;
        $user->birthdate = $payload->birthdate;
        $user->save();
        return $user->fresh();
    }

    public function updatePassword($payload, $userId)
    {
        $user = User::findOrFail($userId);
        $user->password = Hash::make($payload->password);
        $user->save();
        return $user->fresh();
    }

    public function disableUser2FA($userId)
    {
        $user = User::findOrFail($userId);
        $user->is_2fa_enabled = 'disabled';
        $user->save();
        return $user->fresh();
    }

    public function findStoreUsersCount()
    {
        return User::all()->count();
    }
}
