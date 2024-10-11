<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Models\TaskComment;

class UpdateTaskService
{
    /**
     * @param int $id
     * @param array $taskObj
     * 
     * @return void
     */
    public function update(int $id, array $taskObj): void
    {
        try {
            $task = Task::where('id', $id)->first();
            $task->name = $taskObj['name'];
            $task->save();

            TaskComment::create([
                'content' => $taskObj['comment'],
                'task_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
