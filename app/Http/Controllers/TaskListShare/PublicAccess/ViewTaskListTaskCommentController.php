<?php

namespace App\Http\Controllers\TaskListShare\PublicAccess;

use App\Http\Controllers\Controller;
use App\Services\TaskListShare\PublicAccess\ViewTaskListTaskCommentService;

class ViewTaskListTaskCommentController extends Controller
{
    /**
     * @param string $shareToken, 
     * @param string $taskId
     * @param ViewTaskListTaskCommentService $viewTaskListTaskCommentService
     */
    public function __invoke(string $shareToken, string $taskId, ViewTaskListTaskCommentService $viewTaskListTaskCommentService)
    {
        $tasks = $viewTaskListTaskCommentService->view($shareToken, $taskId);

        return view('tasks-lists.public.comment')->with('tasks', $tasks);
    }
}
