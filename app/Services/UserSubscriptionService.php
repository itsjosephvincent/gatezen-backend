<?php

namespace App\Services;

use App\Http\Resources\UserSubscriptionResource;
use App\Interfaces\Repositories\UserSubscriptionsRepositoryInterface;
use App\Interfaces\Services\UserSubscriptionServiceInterface;
use App\Traits\SortingTraits;

class UserSubscriptionService implements UserSubscriptionServiceInterface
{
    use SortingTraits;

    private $userSubscriptionRepository;

    public function __construct(UserSubscriptionsRepositoryInterface $userSubscriptionRepository)
    {
        $this->userSubscriptionRepository = $userSubscriptionRepository;
    }

    public function findUserSubscriptions($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $userSubscription = $this->userSubscriptionRepository->findMany($payload, $sortField, $sortOrder);

        return UserSubscriptionResource::collection($userSubscription);
    }

    public function findStoreOwnerSubscription()
    {
        $userSubscription = $this->userSubscriptionRepository->findOwnerSubscription();

        return new UserSubscriptionResource($userSubscription);
    }

    public function createUserSubscription($payload)
    {
        $userSubscription = $this->userSubscriptionRepository->create($payload);

        return new UserSubscriptionResource($userSubscription);
    }

    public function findUserSubscription($userSubscriptionId)
    {
        $userSubscription = $this->userSubscriptionRepository->findOneById($userSubscriptionId);

        return new UserSubscriptionResource($userSubscription);
    }

    public function updateUserSubscription($planId, $userId)
    {
        $userSub = $this->userSubscriptionRepository->findSubscription($userId);

        if (!$userSub) {
            $payload = (object) [
                'user_id' => $userId,
                'plan_id' => $planId
            ];

            $newUserSubscription = $this->userSubscriptionRepository->create($payload);

            return new UserSubscriptionResource($newUserSubscription);
        }

        $userSubscription = $this->userSubscriptionRepository->update($userId, $planId);

        return new UserSubscriptionResource($userSubscription);
    }
}
