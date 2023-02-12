<?php

namespace App\Repositories;

use App\Interfaces\Repositories\NotificationRepositoryInterface;
use App\Models\Notification;
use Carbon\Carbon;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function findMany($sortField, $sortOrder)
    {
        $userId = auth()->user()->id;

        return Notification::where('notifiable_type', 'App\Models\Admin')
            ->where('notifiable_id', $userId)
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function update($notificationId)
    {
        $notification = Notification::findOrFail($notificationId);
        $notification->read_at = Carbon::now();
        $notification->save();

        return $notification->fresh();
    }

    public function findAllCount()
    {
        $userId = auth()->user()->id;

        return Notification::where('notifiable_type', 'App\Models\Admin')
            ->where('notifiable_id', $userId)
            ->where('read_at', NULL)
            ->get()
            ->count();
    }
}
