<?php

namespace App\Services\Task;

use App\Models\TaskList;
use App\Models\TaskListShare;
use Illuminate\Database\Eloquent\Collection;

final class ViewCreateTaskService
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        $taskList = TaskList::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $taskListShare = TaskListShare::join('task_lists', 'task_list_shares.task_list_id', '=', 'task_lists.id')
            ->where('task_list_shares.user_id', auth()->user()->id)
            ->where('task_list_shares.permission_level', 'edit')
            ->select('task_lists.id', 'task_lists.name')
            ->orderBy('task_lists.created_at', 'DESC')
            ->get();

        return $taskList->merge($taskListShare);
    }
}
