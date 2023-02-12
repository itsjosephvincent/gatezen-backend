<?php

namespace App\Interfaces\Repositories;

interface UserSubscriptionsRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findSubscription(int $userId);
    public function findOwnerSubscription();
    public function create(object $payload);
    public function findOneById(int $userSubscriptionId);
    public function update(int $userId, int $planId);
}
