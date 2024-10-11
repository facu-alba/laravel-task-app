<?php

namespace App\Http\Controllers\TaskList;

use App\Http\Controllers\Controller;

class ViewCreateTaskListController extends Controller
{
    /**
     * 
     */
    public function __invoke()
    {
        return view('tasks-lists.create');
    }
}
