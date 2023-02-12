<?php

namespace App\Services;

use App\Http\Resources\ActivityLogsResource;
use App\Interfaces\Repositories\LogRepositoryInterface;
use App\Interfaces\Services\LogServiceInterface;
use App\Traits\SortingTraits;

class LogService implements LogServiceInterface
{
    use SortingTraits;

    private $logRepository;

    public function __construct(LogRepositoryInterface $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function findLogs(object $payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'desc');

        $logList = $this->logRepository->findMany($sortField, $sortOrder);
        return ActivityLogsResource::collection($logList);
    }

    public function findUserLogs(object $payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'desc');

        $logList = $this->logRepository->findOneByUser($sortField, $sortOrder);
        return ActivityLogsResource::collection($logList);
    }

    public function findStoreLogs($payload, $storeId)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'desc');

        $logList = $this->logRepository->findOneByStore($sortField, $sortOrder, $storeId);
        return ActivityLogsResource::collection($logList);
    }
}
