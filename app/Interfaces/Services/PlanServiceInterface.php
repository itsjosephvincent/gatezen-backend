<?php

namespace App\Interfaces\Services;

interface PlanServiceInterface
{
    public function findPlans(object $payload);
    public function allPlans(object $payload);
    public function createPlan(object $payload);
    public function findPlan(int $planId);
    public function updatePlan(object $payload, int $planId);
}
