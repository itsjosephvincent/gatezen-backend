<?php

namespace App\Repositories;

use Spatie\Activitylog\Models\Activity;
use App\Interfaces\Repositories\LogRepositoryInterface;

class LogRepository implements LogRepositoryInterface
{
    public function findMany($sortField, $sortOrder)
    {
        return Activity::orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneByUser($sortField, $sortOrder)
    {
        $user = auth()->user()->id;
        return Activity::where([
            'causer_type' => 'App\Models\User',
            'causer_id' => $user
        ])->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function findOneByStore($sortField, $sortOrder, $storeId)
    {
        return Activity::where('log_name', 'Store')
            ->where('subject_id', $storeId)
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }
}
