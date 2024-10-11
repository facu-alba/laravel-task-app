<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\Task\UpdateTaskService;

class UpdateTaskController extends Controller
{
    /**
     * @param int $id
     * @param UpdateTaskRequest $updateTaskRequest
     * @param UpdateTaskService $updateTaskService
     */
    public function __invoke(int $id, UpdateTaskRequest $updateTaskRequest, UpdateTaskService $updateTaskService)
    {
        $updateTaskService->update($id, $updateTaskRequest->validated());

        return redirect()->route(ViewUpdateTaskController::class, $id);
    }
}
