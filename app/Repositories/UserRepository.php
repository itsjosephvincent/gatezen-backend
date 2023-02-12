<?php

namespace App\Repositories;

use App\Exceptions\User\InvalidCurrentPasswordException;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\Store;
use App\Models\StoreUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserRepository implements UserRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {

        $user = auth()->user()->id;
        $storeIds = StoreUser::where('user_id', $user)->groupBy('store_id')->pluck('store_id');
        $storeUserIds = StoreUser::whereIn('store_id', $storeIds)->groupBy('user_id')->pluck('user_id');

        $searchStore = $payload->store;
        $searchRole = $payload->role;

        return User::whereIn('id', $storeUserIds)->with([
            'stores_user',
            'stores_user.store',
            'roles',
            'user_subscription',
            'user_subscription.plan',
            'the_gate_index'
        ])->filter($payload->all())
            ->when($searchStore !== null, function ($query) use ($searchStore) {
                $query->whereHas(
                    'stores_user.store',
                    function ($query) use ($searchStore) {
                        $query->where('name', 'like', $searchStore . '%');
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
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function create($payload)
    {
        $user = new User();
        $user->first_name = $payload['first_name'];
        $user->last_name = $payload['last_name'];
        $user->email = $payload['email'];
        $user->mobile = $payload['mobile'];
        $user->birthdate = isset($payload['birthdate']) ? $payload['birthdate'] : NULL;
        $user->password = Hash::make($payload['password']);
        $user->confirmed_at = null;
        $user->img_url = isset($payload['img_url']) ? $payload['img_url'] : NULL;
        $user->is_active = 1;
        $user->is_2fa_enabled = 'disabled';
        $user->google2fa_secret = isset($payload['google2fa_secret']) ? $payload['google2fa_secret'] : NULL;
        $user->save();
        $user->assignRole('store_owner');
        return $user->fresh();
    }

    public function findOneById($userId)
    {
        return User::with([
            'user_subscription.plan',
            'the_gate_index'
        ])->findOrFail($userId);
    }

    public function findOneByEmail($email)
    {
        return User::with([
            'the_gate_index'
        ])->where('email', $email)->first();
    }

    public function findStoresByStoreOwnerId($payload, $userId, $sortField, $sortOrder)
    {
        $storeIds = StoreUser::where('user_id', $userId)->pluck('store_id');

        return Store::with([
            'template',
            'store_category.products',
            'customers.addresses.country'
        ])->whereIn('id', $storeIds)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function update($payload, $userId)
    {
        $user = User::with([
            'user_subscription',
            'the_gate_index'
        ])->findOrFail($userId);
        $user->first_name = $payload['first_name'];
        $user->last_name = $payload['last_name'];
        $user->email = $payload['email'];
        $user->mobile = $payload['mobile'];
        $user->birthdate = isset($payload['birthdate']) ? $payload['birthdate'] : NULL;
        $user->save();

        return $user->fresh();
    }

    public function updateStatus($payload, $userId)
    {
        $user = User::findOrFail($userId);
        $user->is_active = $payload->is_active;
        $user->save();
        return $user->fresh();
    }

    public function updatePassword($payload, $userId)
    {
        $user = User::findOrFail($userId);

        if (!Hash::check($payload->current_password, $user->password)) {
            throw new InvalidCurrentPasswordException();
        }

        $user->password = Hash::make($payload->password);
        $user->save();
        return $user->fresh();
    }

    public function updateImage($payload, $userId)
    {
        $user = User::findOrFail($userId);
        $media = Media::where('model_id', $user->id)->where('model_type', 'App\Models\User')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $user->addMediaFromRequest('img_url')->toMediaCollection('user_media');
        $user->img_url = $user->getMedia('user_media')->last()->getUrl();
        $user->save();
        return $user->fresh();
    }

    public function disable2FAStatus($userId)
    {
        $user = User::findOrFail($userId);
        $user->is_2fa_enabled = 'disabled';
        $user->save();
        return $user->fresh();
    }
}
