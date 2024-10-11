<?php

namespace App\Services\TaskListShare\PublicAccess;

use App\Models\Task;

final class ViewTaskListTaskCommentService
{
    /**
     * @param string $shareToken
     * @param int $taskId
     * 
     * @return array
     */
    public function view(string $shareToken, int $taskId): array
    {
        $task = Task::where('id', $taskId)->first();

        return [
            'task' => $task,
            'comments' => $task->comments()->get(),
        ];
    }
}
