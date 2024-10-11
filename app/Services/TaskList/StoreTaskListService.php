<?php

namespace App\Services\TaskList;

use App\Models\TaskList;

final class StoreTaskListService
{
    /**
     * @param array $taskList
     * 
     * @return void
     */
    public function store(array $taskList): void
    {
        TaskList::create([
            'name' => $taskList['name'],
            'description' => $taskList['description'],
            'user_id' => auth()->user()->id,
        ]);
    }
}
