<?php

namespace App\Http\Controllers\TaskList;

use App\Http\Controllers\Controller;
use App\Services\TaskList\SoftDeleteTaskListService;

class SoftDeleteTaskListController extends Controller
{
    /**
     * @param int $id
     * @param SoftDeleteTaskListService $softDeleteProductService
     */
    public function __invoke(int $id, SoftDeleteTaskListService $softDeleteProductService)
    {
        $softDeleteProductService->delete($id);

        return redirect()->route(ViewAllTaskListController::class);
    }
}
