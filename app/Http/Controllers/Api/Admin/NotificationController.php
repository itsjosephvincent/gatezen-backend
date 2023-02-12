<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Services\NotificationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationServiceInterface $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index(): JsonResponse
    {
        return $this->notificationService->findNotifications()->response();
    }

    public function readNotification($notificationId): JsonResponse
    {
        return $this->notificationService->updateNotification($notificationId)->response();
    }

    public function totalUnreadNotification()
    {
        return $this->notificationService->findUnreadNotificationCount();
    }
}
