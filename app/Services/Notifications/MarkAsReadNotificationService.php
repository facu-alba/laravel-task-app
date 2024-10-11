<?php

namespace App\Services\Notifications;

use App\Models\Notification;

final class MarkAsReadNotificationService
{

    /**
     * Mark as read all selected notifications
     *
     * @return integer
     */
    public static function markAsRead(array $notifications): void
    {
        foreach ($notifications as $id) {
            $notification = Notification::find($id);
            $notification->markAsRead();
        }
    }
}
