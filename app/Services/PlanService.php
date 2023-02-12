<?php

namespace App\Services;

use App\Http\Resources\PlanResource;
use App\Interfaces\Repositories\PlanRepositoryInterface;
use App\Interfaces\Services\PlanServiceInterface;
use App\Traits\SortingTraits;

class PlanService implements PlanServiceInterface
{
    use SortingTraits;

    private $planRepository;

    public function __construct(PlanRepositoryInterface $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    public function findPlans($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $plan = $this->planRepository->findMany($payload, $sortField, $sortOrder);

        return PlanResource::collection($plan);
    }

    public function allPlans($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $plan = $this->planRepository->findAllPlans($payload, $sortField, $sortOrder);

        return PlanResource::collection($plan);
    }

    public function createPlan($payload)
    {
        $plan = $this->planRepository->create($payload);

        return new PlanResource($plan);
    }

    public function findPlan($planId)
    {
        $plan = $this->planRepository->findOneById($planId);

        return new PlanResource($plan);
    }

    public function updatePlan($payload, $planId)
    {
        $plan = $this->planRepository->update($payload, $planId);

        return new PlanResource($plan);
    }
}
