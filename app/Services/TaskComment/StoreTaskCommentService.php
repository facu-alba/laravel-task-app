<?php

namespace App\Services\TaskComment;

use App\Models\Task;

final class StoreTaskCommentService
{
    /**
     * @param array $data
     * 
     * @return void
     */
    public function store(array $data): void
    {
        try {
            $task = Task::findOrFail($data['taskId']);

            $task->comments()->create([
                'content' => $data['content'],
                'user_id' => auth()->id(),
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
