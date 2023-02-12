<?php

namespace App\Services;

use Throwable;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use App\Interfaces\Services\StoreUserServiceInterface;
use App\Interfaces\Repositories\StoreUserRepositoryInterface;

class StoreUserService implements StoreUserServiceInterface
{
    use SortingTraits;

    private $storeUserRepository;
    public function __construct(
        StoreUserRepositoryInterface $storeUserRepository,
    ) {
        $this->storeUserRepository = $storeUserRepository;
    }

    public function findUsers($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $users = $this->storeUserRepository->findMany($payload, $sortField, $sortOrder);
        return UserResource::collection($users);
    }

    public function findStoreUsers($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $users = $this->storeUserRepository->findManyStoreUsers($payload, $sortField, $sortOrder);
        return UserResource::collection($users);
    }

    public function findUser($userId)
    {
        $user = $this->storeUserRepository->findOneById($userId);
        return new UserResource($user);
    }

    public function updateUser($payload, $userId)
    {
        DB::beginTransaction();

        try {
            $this->storeUserRepository->update($payload, $userId);

            DB::commit();

            $user = $this->storeUserRepository->findOneById($userId);
            return new UserResource($user);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateUserPassword($payload, $userId)
    {
        DB::beginTransaction();

        try {
            $user = $this->storeUserRepository->updatePassword($payload, $userId);

            DB::commit();
            return new UserResource($user);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function disableUser2FA($userId)
    {
        DB::beginTransaction();

        try {
            $user = $this->storeUserRepository->disableUser2FA($userId);

            DB::commit();
            return new UserResource($user);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
