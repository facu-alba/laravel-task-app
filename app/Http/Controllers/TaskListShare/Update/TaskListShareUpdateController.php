<?php

namespace App\Http\Controllers\TaskListShare\Update;

use App\Http\Controllers\Controller;
use App\Services\TaskListShare\Update\TaskListShareUpdateService;

class TaskListShareUpdateController extends Controller
{
    /**
     * @param int $taskListId
     * @param TaskListShareUpdateService $taskListShareUpdateService
     */
    public function __invoke(int $taskListId, TaskListShareUpdateService $taskListShareUpdateService)
    {
        $taskListShareUpdateService->update($taskListId, request()->all());

        //return redirect()->route();
    }
}
