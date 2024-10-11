<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Services\Task\ViewCreateTaskService;

class ViewCreateTaskController extends Controller
{
    /**
     * @param ViewCreateTaskService $viewCreateTaskService
     */
    public function __invoke(ViewCreateTaskService $viewCreateTaskService)
    {
        return view('tasks.create')->with('taskLists', $viewCreateTaskService->all());
    }
}
