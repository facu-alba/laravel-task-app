<?php

namespace App\Http\Controllers\TaskListShare;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use App\Services\TaskListShare\ShareTaskListService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskListShareController extends Controller
{
    /**
     * @param int $taskListId
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function __invoke(int $taskListId, Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'permission_level' => 'required',
        ]);

        $taskList = TaskList::findOrFail($taskListId);

        try {
            $shareTaskListService = new ShareTaskListService($taskList);
            $shareTaskListService->share($validated);

            return response()->json([
                'message' => 'Lista compartida exitosamente.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocurrió un error al compartir la lista.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
