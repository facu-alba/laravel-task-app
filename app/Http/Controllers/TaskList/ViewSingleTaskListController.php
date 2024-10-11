<?php

namespace App\Http\Controllers\TaskList;

use App\Http\Controllers\Controller;
use App\Services\TaskList\ViewSingleTaskListService;

class ViewSingleTaskListController extends Controller
{
    /**
     * @param int $id
     * @param ViewSingleTaskListService $viewSingleTaskListService
     */
    public function __invoke(int $id, ViewSingleTaskListService $viewSingleTaskListService)
    {
        $taskList = $viewSingleTaskListService->single($id);

        return view('tasks-lists.view')->with('taskList', $taskList);
    }
}
