<?php

namespace App\Interfaces\Repositories;

interface PlanRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findAllPlans(object $payload, string $sortField, string $sortOrder);
    public function create(object $payload);
    public function findOneById(int $planId);
    public function findByKey(string $key);
    public function update(object $payload, int $planId);
}
