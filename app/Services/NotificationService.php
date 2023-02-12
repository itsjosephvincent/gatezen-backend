<?php

namespace App\Services;

use App\Http\Resources\NotificationResource;
use App\Interfaces\Repositories\NotificationRepositoryInterface;
use App\Interfaces\Services\NotificationServiceInterface;
use App\Traits\SortingTraits;

class NotificationService implements NotificationServiceInterface
{
    use SortingTraits;

    private $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function findNotifications($sortField = 'created_at', $sortOrder = 'desc')
    {
        $notifications = $this->notificationRepository->findMany($sortField, $sortOrder);

        return NotificationResource::collection($notifications);
    }

    public function updateNotification($notificationId)
    {
        $notification = $this->notificationRepository->update($notificationId);

        return new NotificationResource($notification);
    }

    public function findUnreadNotificationCount()
    {
        $notification = $this->notificationRepository->findAllCount();

        return $notification;
    }
}
