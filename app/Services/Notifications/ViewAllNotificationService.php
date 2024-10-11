<?php

namespace App\Services\Notifications;

use App\Models\Notification;
use Illuminate\Support\Collection;

class ViewAllNotificationService
{

    /**
     * Fetch all readed notifications
     *
     * @return \Illuminate\Support\Collection
     */
    public function readedNotifications(): Collection
    {
        return Notification::fetchReadedNotifications();
    }

    /**
     * Fetch all unreaded notifications
     *
     * @return \Illuminate\Support\Collection
     */
    public function unreadedNotifications(): Collection
    {
        return Notification::fetchUnreadedNotifications();
    }
}
