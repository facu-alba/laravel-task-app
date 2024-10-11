<?php

namespace App\Http\Controllers\TaskList;

use App\Http\Controllers\Controller;
use App\Services\TaskList\ViewAllTaskListService;

class ViewAllTaskListController extends Controller
{
    /**
     * @param ViewAllTaskListService $viewAllTaskListService
     */
    public function __invoke(ViewAllTaskListService $viewAllTaskListService)
    {
        return view('tasks-lists.index')->with('tasksLists', $viewAllTaskListService->all());
    }
}
