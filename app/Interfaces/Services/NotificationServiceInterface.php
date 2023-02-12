<?php

namespace App\Interfaces\Services;

interface NotificationServiceInterface
{
    public function findNotifications();
    public function updateNotification(int $notificationId);
    public function findUnreadNotificationCount();
}
