<?php

namespace App\Services;

use App\Http\Resources\CustomerAddressResource;
use App\Interfaces\Repositories\CustomerAddressRepositoryInterface;
use App\Interfaces\Services\CustomerAddressServiceInterface;
use App\Traits\SortingTraits;

class CustomerAddressService implements CustomerAddressServiceInterface
{
    use SortingTraits;

    private $customerAddressRepository;

    public function __construct(CustomerAddressRepositoryInterface $customerAddressRepository)
    {
        $this->customerAddressRepository = $customerAddressRepository;
    }

    public function findCustomerAddresses($payload)
    {
        $sortField = $this->sortField($payload, 'care_of');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $customerAddress = $this->customerAddressRepository->findMany($payload, $sortField, $sortOrder);
        return CustomerAddressResource::collection($customerAddress);
    }

    public function findLoggedInCustomerAddresses($payload)
    {
        $sortField = $this->sortField($payload, 'care_of');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $customerAddress = $this->customerAddressRepository->findManyByLoggedInCustomer($payload, $sortField, $sortOrder);
        return CustomerAddressResource::collection($customerAddress);
    }

    public function createCustomerAddress($payload)
    {
        $customerAddress = $this->customerAddressRepository->create($payload);
        return new CustomerAddressResource($customerAddress);
    }

    public function findCustomerAddress($customerAddressId)
    {
        $customerAddress = $this->customerAddressRepository->findOneById($customerAddressId);
        return new CustomerAddressResource($customerAddress);
    }

    public function updateCustomerAddress($payload, $customerAddressId)
    {
        $customerAddress = $this->customerAddressRepository->update($payload, $customerAddressId);
        return new CustomerAddressResource($customerAddress);
    }
}
