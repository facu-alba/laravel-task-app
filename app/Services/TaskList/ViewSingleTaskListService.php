<?php

namespace App\Services\TaskList;

use App\Models\TaskList;

final class ViewSingleTaskListService
{
    /**
     * @param int $taskListId
     */
    public function single(int $taskListId)
    {
        return TaskList::find($taskListId);
    }
}
