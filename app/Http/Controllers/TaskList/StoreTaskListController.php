<?php

namespace App\Http\Controllers\TaskList;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskListRequest;
use App\Services\TaskList\StoreTaskListService;

class StoreTaskListController extends Controller
{
    /**
     * @param StoreTaskListRequest $storeTaskListRequest
     * @param StoreTaskListService $storeTaskListService
     */
    public function __invoke(StoreTaskListRequest $storeTaskListRequest, StoreTaskListService $storeTaskListService)
    {
        $storeTaskListService->store($storeTaskListRequest->validated());

        return redirect()->route(ViewAllTaskListController::class);
    }
}
