<?php

namespace App\Services\TaskListShare\Update;

use App\Models\Task;
use App\Models\TaskList;
use App\Models\User;
use App\Notifications\TaskUpdatedNotification;

final class TaskListShareUpdateService
{
    /**
     * @param int $taskListId
     * @param array $data
     */
    public function update(int $taskListId, array $data): void
    {
        $task = Task::where('id', $data['id'])->where('task_list_id', $taskListId)->first();
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->save();

        $this->notifyToUserWhoSharedTheList($task, $taskListId);
    }

    /**
     * @param Task $task
     * @param int $taskListId
     */
    private function notifyToUserWhoSharedTheList(Task $task, int $taskListId): void
    {
        $taskList = TaskList::where('id', $taskListId)->first();
        $user = User::findOrFail($taskList->user_id);
        $user->notify(new TaskUpdatedNotification($task));
    }
}
