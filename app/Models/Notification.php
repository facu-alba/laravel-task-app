<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Collection;

class Notification extends DatabaseNotification
{
    use HasFactory;

    /**
     * The table related to this model.
     *
     * @var string
     */
    protected $table = 'notifications';

    /**
     * Get all readed notifications
     * 
     * @return \Illuminate\Support\Collection
     */
    public static function fetchReadedNotifications(): Collection
    {
        return static::orderBy('read_at', 'asc')
            ->orderBy('created_at', 'desc')
            ->whereNotNull('read_at')
            ->get();
    }

    /**
     * Get all unreaded notifications
     * 
     * @return \Illuminate\Support\Collection
     */
    public static function fetchUnreadedNotifications(): Collection
    {
        $userId = auth()->user()->id;

        return static::whereNull('notifications.read_at')
            ->where(function ($query) use ($userId) {
                // Mostrar notificaciones no leídas donde el usuario es el propietario (user_id) 
                // o cuando la tarea fue compartida por el usuario (shared_by)
                $query->whereIn('notifications.notifiable_id', function ($subQuery) use ($userId) {
                    $subQuery->select('task_list_shares.user_id')
                        ->from('task_list_shares')
                        ->where('task_list_shares.user_id', $userId);
                })
                    ->orWhereIn('notifications.notifiable_id', function ($subQuery) use ($userId) {
                        $subQuery->select('task_list_shares.shared_by')
                            ->from('task_list_shares')
                            ->where('task_list_shares.shared_by', $userId);
                    });
            })
            ->orderBy('notifications.created_at', 'desc')
            ->select('notifications.*')
            ->distinct()
            ->get();
    }
}
