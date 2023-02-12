<?php

namespace App\Services;

use App\Events\ZohoContactEvent;
use App\Http\Resources\CustomerAccountDetailsResource;
use App\Http\Resources\CustomerResource;
use App\Interfaces\Repositories\CustomerRepositoryInterface;
use App\Interfaces\Repositories\EmailVerificationRepositoryInterface;
use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Interfaces\Services\CustomerServiceInterface;
use App\Jobs\SendEmaiLVerification;
use App\Repositories\EmailVerificationRepository;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use Throwable;

class CustomerService implements CustomerServiceInterface
{
    use SortingTraits;

    private $customerRepository;
    private $storeRepository;
    private $emailVerificationRepository;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        StoreRepositoryInterface $storeRepository,
        EmailVerificationRepositoryInterface $emailVerificationRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->storeRepository = $storeRepository;
        $this->emailVerificationRepository = $emailVerificationRepository;
    }

    public function findCustomers($payload)
    {
        $sortField = $this->sortField($payload, 'first_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $customerList = $this->customerRepository->findMany($payload, $sortField, $sortOrder);
        return CustomerResource::collection($customerList);
    }

    public function findLoggedInCustomer()
    {
        $userId = auth()->user()->id;
        $customer = $this->customerRepository->findOneById($userId);
        return new CustomerResource($customer);
    }

    public function findCustomer($customerId)
    {
        $customer = $this->customerRepository->findOneById($customerId);
        return new CustomerResource($customer);
    }

    public function findStoreAddress($customerId)
    {
        $customer = $this->customerRepository->findCustomerStoreAndAddress($customerId);
        return new CustomerResource($customer);
    }

    public function createCustomer($payload, $store)
    {
        DB::beginTransaction();
        try {
            $customer = $this->customerRepository->create($payload, $store);
            $emailVerification = $this->emailVerificationRepository->create($customer->email);

            ZohoContactEvent::dispatch($customer);

            SendEmaiLVerification::dispatch($customer->email, $emailVerification->token, $store)
                ->onQueue('sendemail');
            DB::commit();
            return new CustomerResource($customer);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function findByStoreUser($payload)
    {
        $sortField = $this->sortField($payload, 'first_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $customers = $this->customerRepository->findOneByStoreUser($payload, $sortField, $sortOrder);
        return CustomerResource::collection($customers);
    }

    public function findByStoreId($payload, $storeId)
    {
        $sortField = $this->sortField($payload, 'first_name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $customers = $this->customerRepository->findOneByStoreId($payload, $storeId, $sortField, $sortOrder);
        return CustomerResource::collection($customers);
    }

    public function updateCustomer($payload, $customerId)
    {
        $customer = $this->customerRepository->update($payload, $customerId);
        return new CustomerResource($customer);
    }

    public function updateCustomerStatus($payload, $customerId)
    {
        $customer = $this->customerRepository->updateStatus($payload, $customerId);
        return new CustomerResource($customer);
    }

    public function updateCustomerPassword($payload, $customerId)
    {
        $customer = $this->customerRepository->updatePassword($payload, $customerId);
        return new CustomerResource($customer);
    }

    public function disableGoogleTwoAuthData($customerId)
    {
        $customer = $this->customerRepository->disableGoogleTwoAuth($customerId);
        return new CustomerResource($customer);
    }

    public function updateCustomerDetails($payload)
    {
        $userId = auth()->user()->id;

        if (isset($payload->current_password)) {
            $this->updateCustomerPassword($payload, $userId);
        }

        $customer = $this->updateCustomer($payload, $userId);

        $data = (object) [
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'display_name' => $customer->display_name,
            'email' => $customer->email
        ];

        return new CustomerAccountDetailsResource($data);
    }
}
