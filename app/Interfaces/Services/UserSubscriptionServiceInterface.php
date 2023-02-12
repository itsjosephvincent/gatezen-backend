<?php

namespace App\Interfaces\Services;

interface UserSubscriptionServiceInterface
{
    public function findUserSubscriptions(object $payload);
    public function findStoreOwnerSubscription();
    public function createUserSubscription(object $payload);
    public function findUserSubscription(int $userSubscriptionId);
    public function updateUserSubscription(int $planId, int $userId);
}
