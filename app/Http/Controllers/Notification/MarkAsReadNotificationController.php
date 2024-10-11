<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Services\Notifications\MarkAsReadNotificationService;
use Illuminate\Http\Request;

class MarkAsReadNotificationController extends Controller
{
    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        MarkAsReadNotificationService::markAsRead($request->all());
    }
}
