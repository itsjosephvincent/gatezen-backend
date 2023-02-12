<?php

namespace App\Repositories;

use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return Address::where('user_id', $userId)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneById($addressId)
    {
        return Address::findOrFail($addressId);
    }

    public function create($payload)
    {
        $userId = auth()->user()->id;

        $address = new Address();
        $address->user_id = $userId;
        $address->care_of = $payload->care_of;
        $address->address_1 = $payload->address_1;
        $address->address_2 = $payload->address_2;
        $address->city = $payload->city;
        $address->postal_code = $payload->postal_code;
        $address->country_id = $payload->country_id;
        $address->save();
        return $address->fresh();
    }

    public function createAddressFromTgiRegister($payload, $userId, $countryId)
    {
        if (isset($payload->street)) {
            $address = new Address();
            $address->user_id = $userId;
            $address->care_of = isset($payload['care_of']) ? $payload['care_of'] : NULL;
            $address->address_1 = isset($payload['street']) ? $payload['street'] : NULL;
            $address->address_2 = isset($payload['street2']) ? $payload['street2'] : NULL;
            $address->city = $payload['city'];
            $address->postal_code = $payload['postal'];
            $address->country_id = $countryId;
            $address->save();
            return $address->fresh();
        } else {
            $address = new Address();
            $address->user_id = $userId;
            $address->care_of = isset($payload['care_of']) ? $payload['care_of'] : NULL;
            $address->address_1 = isset($payload['address']) ? $payload['address'] : NULL;
            $address->address_2 = isset($payload['address_2']) ? $payload['address_2'] : NULL;
            $address->city = $payload['city'];
            $address->postal_code = $payload['postal'];
            $address->country_id = $countryId;
            $address->save();
            return $address->fresh();
        }
    }

    public function createAddressFromTgiLogin($payload, $userId, $countryId)
    {
        $address = new Address();
        $address->user_id = $userId;
        $address->care_of = isset($payload['care_of']) ? $payload['care_of'] : NULL;
        $address->address_1 = $payload['street'];
        $address->address_2 = $payload['street2'];
        $address->city = $payload['city'];
        $address->postal_code = $payload['postal'];
        $address->country_id = $countryId;
        $address->save();
        return $address->fresh();
    }


    public function update($payload, $addressId)
    {
        $userId = auth()->user()->id;

        $address = Address::findOrFail($addressId);

        $address->user_id = $userId;
        $address->care_of = $payload->care_of;
        $address->address_1 = $payload->address_1;
        $address->address_2 = $payload->address_2;
        $address->city = $payload->city;
        $address->postal_code = $payload->postal_code;
        $address->country_id = $payload->country_id;
        $address->save();
        return $address->fresh();
    }

    public function updateAddressFromTgiLogin($payload, $userId, $countryId)
    {
        $address = Address::where('user_id', $userId)->first();
        $address->user_id = $userId;
        $address->care_of = isset($payload['care_of']) ? $payload['care_of'] : NULL;
        $address->address_1 = $payload['street'];
        $address->address_2 = $payload['street2'];
        $address->city = $payload['city'];
        $address->postal_code = $payload['postal'];
        $address->country_id = $countryId;
        $address->save();
        return $address->fresh();
    }

    public function updateAddressFromTgiRegister($payload, $userId, $countryId)
    {
        $address = Address::where('user_id', $userId)->first();
        $address->user_id = $userId;
        $address->care_of = isset($payload['care_of']) ? $payload['care_of'] : NULL;
        $address->address_1 = $payload['address'];
        $address->address_2 = isset($payload['address_2']) ? $payload['address_2'] : NULL;
        $address->city = $payload['city'];
        $address->postal_code = $payload['postal'];
        $address->country_id = $countryId;
        $address->save();
        return $address->fresh();
    }
}
