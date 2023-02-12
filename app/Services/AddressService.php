<?php

namespace App\Services;

use App\Http\Resources\AddressResource;
use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Interfaces\Services\AddressServiceInterface;
use App\Traits\SortingTraits;

class AddressService implements AddressServiceInterface
{
    use SortingTraits;

    private $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function findAddresses(object $payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $addressList = $this->addressRepository->findMany($payload, $sortField, $sortOrder);
        return AddressResource::collection($addressList);
    }

    public function findAddress($id)
    {
        $address = $this->addressRepository->findOneById($id);
        return new AddressResource($address);
    }

    public function createAddress($payload)
    {
        $address = $this->addressRepository->create($payload);
        return new AddressResource($address);
    }

    public function updateAddress($payload, $id)
    {
        $address = $this->addressRepository->update($payload, $id);
        return new AddressResource($address);
    }
}
