<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Services\Notifications\ViewAllNotificationService;

class ViewAllNotificationController extends Controller
{
    /**
     * @param ViewAllNotificationService $viewAllNotificationService
     */
    public function __invoke(ViewAllNotificationService $viewAllNotificationService)
    {
        $readedNotifications = $viewAllNotificationService->readedNotifications();
        $unreadedNotifications = $viewAllNotificationService->unreadedNotifications();

        return view('notifications.index')
            ->with('readedNotifications', $readedNotifications)
            ->with('unreadedNotifications', $unreadedNotifications);
    }
}
