<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Services\Task\ViewAllTaskService;

class ViewAllTaskController extends Controller
{
    /**
     * @param ViewAllTaskService $taskService
     */
    public function __invoke(ViewAllTaskService $taskService)
    {
        return view('tasks.index')->with('tasks', $taskService->all());
    }
}
