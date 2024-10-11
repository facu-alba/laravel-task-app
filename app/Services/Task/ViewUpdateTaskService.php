<?php

namespace App\Services\Task;

use App\Models\Task;

final class ViewUpdateTaskService
{
    /**
     * @param string $taskId
     * 
     * @return Task
     */
    public function update(string $taskId): Task
    {
        try {
            $task = Task::where('id', $taskId)->first();
            
            return $task;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
