<?php

namespace App\Services;

use App\Http\Resources\UserBankDetailsResource;
use App\Interfaces\Repositories\UserBankDetailsRepositoryInterface;
use App\Interfaces\Services\UserBankDetailsServiceInterface;
use App\Traits\SortingTraits;

class UserBankDetailsService implements UserBankDetailsServiceInterface
{
    use SortingTraits;

    private $userBankDetailsRepository;

    public function __construct(UserBankDetailsRepositoryInterface $userBankDetailsRepository)
    {
        $this->userBankDetailsRepository = $userBankDetailsRepository;
    }

    public function findUserBankDetails($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $bankDetails = $this->userBankDetailsRepository->findMany($payload, $sortField, $sortOrder);

        return UserBankDetailsResource::collection($bankDetails);
    }

    public function findUserBankDetailsList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $bankDetails = $this->userBankDetailsRepository->findManyList($payload, $sortField, $sortOrder);

        return UserBankDetailsResource::collection($bankDetails);
    }

    public function findUserBankDetail($userBankDetailsId)
    {
        $bankDetails = $this->userBankDetailsRepository->findOneById($userBankDetailsId);

        return new UserBankDetailsResource($bankDetails);
    }

    public function createUserBankDetails($payload)
    {
        $bankDetails = $this->userBankDetailsRepository->create($payload);

        return new UserBankDetailsResource($bankDetails);
    }

    public function updateUserBankDetails($payload, $userBankDetailsId)
    {
        $bankDetails = $this->userBankDetailsRepository->update($payload, $userBankDetailsId);

        return new UserBankDetailsResource($bankDetails);
    }

    public function deleteUserBankDetails($userBankDetailsId)
    {
        $this->userBankDetailsRepository->delete($userBankDetailsId);
    }
}
