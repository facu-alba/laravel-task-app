<?php

use App\Http\Controllers\Notification\MarkAsReadNotificationController;
use App\Http\Controllers\Notification\ViewAllNotificationController;
use App\Http\Controllers\Task\StoreTaskController;
use App\Http\Controllers\Task\UpdateTaskController;
use App\Http\Controllers\Task\ViewAllTaskController;
use App\Http\Controllers\Task\ViewCreateTaskController;
use App\Http\Controllers\Task\ViewUpdateTaskController;
use App\Http\Controllers\TaskList\SoftDeleteTaskListController;
use App\Http\Controllers\TaskList\StoreTaskListController;
use App\Http\Controllers\TaskList\ViewAllTaskListController;
use App\Http\Controllers\TaskList\ViewCreateTaskListController;
use App\Http\Controllers\TaskList\ViewSingleTaskListController;
use App\Http\Controllers\TaskListShare\PublicAccess\TaskListSharePublicAccessController;
use App\Http\Controllers\TaskListShare\PublicAccess\ViewTaskListTaskCommentController;
use App\Http\Controllers\TaskListShare\TaskListShareController;
use App\Http\Controllers\TaskListShare\Update\TaskListShareUpdateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/tasks-list', ViewAllTaskListController::class)->name(ViewAllTaskListController::class);
    Route::get('/tasks-list-create', ViewCreateTaskListController::class)->name(ViewCreateTaskListController::class);
    Route::get('/tasks-list/{id}', ViewSingleTaskListController::class)->name(ViewSingleTaskListController::class);
    Route::delete('/tasks-list/{id}', SoftDeleteTaskListController::class)->name(SoftDeleteTaskListController::class);
    Route::post('/tasks-list-create', StoreTaskListController::class)->name(StoreTaskListController::class);

    // Rutas para compartir listas
    Route::post('/tasks-list/{id}/share', TaskListShareController::class)->name(TaskListShareController::class);
    /*Route::post('/task-list/{id}/share-link', [TaskListShareController::class, 'generateShareLink']);
    Route::delete('/task-list/{id}/share/{user}', [TaskListShareController::class, 'removeShare']);*/

    // Rutas para ver listas compartidas
    // Route::get('/shared-task-lists', [TaskListShareController::class, 'index']);
    // Route::get('/task-lists/{taskList}/shared-users', [TaskListShareController::class, 'sharedUsers']);

    Route::get('/tasks', ViewAllTaskController::class)->name(ViewAllTaskController::class);
    Route::get('/tasks/{id}/edit', ViewUpdateTaskController::class)->name(ViewUpdateTaskController::class);
    Route::put('/tasks/{id}', UpdateTaskController::class)->name(UpdateTaskController::class);

    Route::get('/tasks-create', ViewCreateTaskController::class)->name(ViewCreateTaskController::class);
    Route::post('/tasks-create', StoreTaskController::class)->name(StoreTaskController::class);

    // notifications
    Route::get('/notifications', ViewAllNotificationController::class)->name(ViewAllNotificationController::class);
    Route::put('/notifications/mark-as-read', MarkAsReadNotificationController::class)->name(MarkAsReadNotificationController::class);
});

// Ruta pública para acceder a través de link compartido
Route::get('/shared/task-list/{token}', TaskListSharePublicAccessController::class)->name(TaskListSharePublicAccessController::class);
Route::get('/shared/task-list/{token}/{taskId}/comments', ViewTaskListTaskCommentController::class)->name(ViewTaskListTaskCommentController::class);
Route::put('/shared/task-list/{taskListId}/update', TaskListShareUpdateController::class)->name(TaskListShareUpdateController::class);
