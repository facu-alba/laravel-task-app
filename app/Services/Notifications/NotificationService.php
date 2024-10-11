<?php

namespace App\Services\Notifications;

final class NotificationService
{

    /**
     * Fetch total count of notifications
     *
     * @return integer
     */
    public static function fetchTotal(): int
    {
        return auth()->user()->notifications->count();
    }
}
