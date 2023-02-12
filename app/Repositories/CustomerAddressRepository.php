<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CustomerAddressRepositoryInterface;
use App\Models\CustomerAddress;

class CustomerAddressRepository implements CustomerAddressRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        return CustomerAddress::with(['country'])->orderBy($sortField, $sortOrder)->get();
    }

    public function findManyByLoggedInCustomer($payload, $sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return CustomerAddress::with(['country'])
            ->where('customer_id', $userId)
            ->get();
    }

    public function create($payload)
    {
        $userId = auth()->user()->id;

        $customerAddress = CustomerAddress::updateOrCreate(
            [
                'customer_id' => $userId,
                'address_type' => $payload->address_type,
            ],
            [
                'care_of' => isset($payload->care_of) ? $payload->care_of : NULL,
                'address_1' => $payload->address_1,
                'address_2' => $payload->address_2,
                'city' => $payload->city,
                'state' => $payload->state,
                'postal_code' => $payload->postal_code,
                'country_id' => $payload->country_id,
                'delivery_notes' => isset($payload->delivery_notes) ? $payload->delivery_notes : NULL
            ]
        );
        return $customerAddress->fresh(['country']);
    }

    public function findOneById($customerAddressId)
    {
        return CustomerAddress::findOrFail($customerAddressId);
    }

    public function findOneByCustomerId($addressType, $customerId)
    {
        return CustomerAddress::where('address_type', $addressType)
            ->where('customer_id', $customerId)
            ->first();
    }

    public function update($payload, $customerId)
    {
        $customerAddress = CustomerAddress::updateOrCreate(
            [
                'customer_id' => $customerId,
                'address_type' => $payload->address_type,
            ],
            [
                'care_of' => isset($payload->care_of) ? $payload->care_of : NULL,
                'address_1' => $payload->address_1,
                'address_2' => $payload->address_2,
                'city' => $payload->city,
                'state' => $payload->state,
                'postal_code' => $payload->postal_code,
                'country_id' => $payload->country_id,
                'delivery_notes' => isset($payload->delivery_notes) ? $payload->delivery_notes : NULL
            ]
        );

        return $customerAddress->fresh(['country']);
    }
}
