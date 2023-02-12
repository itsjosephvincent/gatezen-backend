<?php

namespace App\Repositories;

use App\Exceptions\Store\InvalidStoreException;
use App\Exceptions\User\InvalidCurrentPasswordException;
use App\Models\Customer;
use App\Models\StoreUser;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Repositories\CustomerRepositoryInterface;
use App\Models\Store;


class CustomerRepository implements CustomerRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $searchOwner = $payload->owner;
        return Customer::with([
            'addresses',
            'addresses.country',
            'orders.order_details',
            'store',
            'owner',
        ])->filter($payload->all())
            ->when($searchOwner !== null, function ($query) use ($searchOwner) {
                $query->whereHas(
                    'owner',
                    function ($query) use ($searchOwner) {
                        $query->where('first_name', 'like', $searchOwner . '%')
                            ->orWhere('last_name', 'like', $searchOwner . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneById($customerId)
    {
        return Customer::with([
            'addresses',
            'addresses.country',
            'store',
            'cart_items',
            'owner'
        ])->findOrFail($customerId);
    }

    public function findOneByEmail($email)
    {
        return Customer::where('email', $email)->first();
    }

    public function findCustomerStoreAndAddress($customerId)
    {
        return Customer::with([
            'store',
            'addresses',
            'addresses.country',
        ])->findOrFail($customerId);
    }

    public function create($payload, $store)
    {
        if ($store) {
            $customer = new Customer();
            $customer->user_id = $store->store_owner->user_id;
            $customer->store_id = $store->id;
            $customer->first_name = $payload->first_name;
            $customer->last_name = $payload->last_name;
            $customer->display_name = $payload->first_name . ' ' . $payload->last_name;
            $customer->email = $payload->email;
            $customer->is_active = 0;
            $customer->password = Hash::make($payload->password);
            $customer->save();

            return $customer->fresh();
        }

        throw new InvalidStoreException();
    }

    public function findOneByStoreUser($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;
        $storeIds = StoreUser::where('user_id', $userId)->pluck('store_id');

        $searchStore = $payload->store;

        return Customer::with([
            'addresses',
            'addresses.country',
            'orders.order_details',
            'store'
        ])->whereIn('store_id', $storeIds)
            ->filter($payload->all())
            ->when($searchStore !== null, function ($query) use ($searchStore) {
                $query->whereHas(
                    'store',
                    function ($query) use ($searchStore) {
                        $query->where('store_name', 'like', $searchStore . '%');
                    }
                );
            })
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneByStoreId($payload, $storeId, $sortField, $sortOrder)
    {
        return Customer::where('store_id', $storeId)
            ->with(['addresses'])
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function update($payload, $customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $customer->user_id = isset($payload->user_id) ? $payload->user_id : $customer->user_id;
        $customer->store_id  = isset($payload->store_id) ? $payload->store_id : $customer->store_id;
        $customer->customer_type = isset($payload->customer_type) ? $payload->customer_type : $customer->customer_type;
        $customer->company_name = isset($payload->company_name) ? $payload->company_name : $customer->company_name;
        $customer->business_number = isset($payload->business_number) ? $payload->business_number : $customer->business_number;
        $customer->first_name = $payload->first_name;
        $customer->last_name = $payload->last_name;
        $customer->display_name = $payload->display_name;
        $customer->birthdate = isset($payload->birthdate) ? $payload->birthdate : $customer->birthdate;
        $customer->gender = isset($payload->gender) ? $payload->gender : $customer->gender;
        $customer->email = $payload->email;
        $customer->mobile = isset($payload->mobile) ? $payload->mobile : NULL;
        $customer->save();
        return $customer->fresh();
    }

    public function updateStatus($payload, $customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $customer->is_active = $payload->is_active;
        $customer->save();
        return $customer->fresh();
    }

    public function updatePassword($payload, $customerId)
    {
        $customer = Customer::findOrFail($customerId);

        if (!Hash::check($payload->current_password, $customer->password)) {
            throw new InvalidCurrentPasswordException();
        }

        $customer->password = Hash::make($payload->password);
        $customer->save();
        return $customer->fresh();
    }

    public function disableGoogleTwoAuth($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $customer->is_2fa_enabled = 'disabled';
        $customer->save();
        return $customer->fresh();
    }

    public function findStoreCustomersCount($storeId)
    {
        return Customer::whereIn('store_id', $storeId)->count();
    }
}
