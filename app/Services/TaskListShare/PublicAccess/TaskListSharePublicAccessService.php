<?php

namespace App\Services\TaskListShare\PublicAccess;

use App\Models\TaskListShare;

final class TaskListSharePublicAccessService
{
    /**
     * @param string $token
     * 
     * @return array
     */
    public function view(string $token): array
    {
        $taskListShare = TaskListShare::where('share_token', $token)
            ->where('token_expires_at', '>', now())
            ->firstOrFail();

        $taskList = $taskListShare->taskList->load(['tasks' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'user:id,name,email']);

        return [
            'tasks' => $taskList->tasks()->get(),
            'task_list' => $taskList,
            'task_list_share_token' => $taskListShare->share_token,
            'permission_level' => $taskListShare->permission_level
        ];
    }
}
