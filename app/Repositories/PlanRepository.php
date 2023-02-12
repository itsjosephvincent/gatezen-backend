<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PlanRepositoryInterface;
use App\Models\Plan;

class PlanRepository implements PlanRepositoryInterface
{
    public function findMany($payload, $sortField, $sortOrder)
    {
        return Plan::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findAllPlans($payload, $sortField, $sortOrder)
    {
        return Plan::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->get();
    }

    public function create($payload)
    {
        $plan = new Plan();
        $plan->name = $payload->name;
        $plan->key = $payload->key;
        $plan->commission = $payload->commission;
        $plan->save();

        return $plan->fresh();
    }

    public function findOneById($planId)
    {
        return Plan::findOrFail($planId);
    }

    public function findByKey($key)
    {
        return Plan::where('key', $key)->first();
    }

    public function update($payload, $planId)
    {
        $plan = Plan::findOrFail($planId);
        $plan->name = $payload->name;
        $plan->key = $payload->key;
        $plan->commission = $payload->commission;
        $plan->save();

        return $plan->fresh();
    }
}
