<?php

namespace App\Http\Controllers\TaskListShare\PublicAccess;

use App\Http\Controllers\Controller;
use App\Services\TaskListShare\PublicAccess\TaskListSharePublicAccessService;

class TaskListSharePublicAccessController extends Controller
{
    /**
     * @param string $token
     * @param TaskListSharePublicAccessService $taskListSharePublicAccessService
     */
    public function __invoke(string $token, TaskListSharePublicAccessService $taskListSharePublicAccessService)
    {
        $taskList = $taskListSharePublicAccessService->view($token);

        return view('tasks-lists.public.view')->with('taskList', $taskList);
    }
}
