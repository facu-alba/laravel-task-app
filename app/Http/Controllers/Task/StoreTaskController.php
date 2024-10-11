<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Services\Task\StoreTaskService;

class StoreTaskController extends Controller
{
    /**
     * @param StoreTaskRequest $storeTaskRequest
     * @param StoreTaskService $storeTaskService
     */
    public function __invoke(StoreTaskRequest $storeTaskRequest, StoreTaskService $storeTaskService)
    {
        $storeTaskService->store($storeTaskRequest->validated());

        return redirect()->route(ViewAllTaskController::class);
    }
}
