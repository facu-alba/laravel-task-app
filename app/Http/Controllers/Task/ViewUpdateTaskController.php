<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Services\Task\ViewUpdateTaskService;

class ViewUpdateTaskController extends Controller
{
    /**
     * @param string $taskId
     * @param ViewUpdateTaskService $viewUpdateTaskService
     */
    public function __invoke(string $taskId, ViewUpdateTaskService $viewUpdateTaskService)
    {
        $task = $viewUpdateTaskService->update($taskId);

        return view('tasks.edit')->with('task', $task);
    }
}
