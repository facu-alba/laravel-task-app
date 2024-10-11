<?php

namespace App\Services\TaskList;

use App\Constants\Resend\Messages\NotificationMessages;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\TaskListShare;
use App\Models\User;
use App\Notifications\TaskListDeletedNotification;
use App\Services\Resend\ResendEmailService;
use Illuminate\Support\Facades\DB;

final class SoftDeleteTaskListService
{
    /**
     * @param int $id
     * 
     * @return void
     */
    public function delete(int $id): void
    {
        DB::beginTransaction();

        try {
            $taskList = TaskList::find($id);
            $taskList->delete();

            $tasks = Task::join('task_lists', 'task_lists.id', '=', 'tasks.task_list_id')
                ->where('tasks.task_list_id', $id)
                ->select('tasks.id', 'tasks.name')
                ->orderBy('tasks.created_at', 'DESC')
                ->get();

            foreach ($tasks as $task) {
                $task->delete();
            }

            $taskListShare = TaskListShare::where('shared_by', $taskList->user_id)->first();
            $taskListShare->delete();

            $user = User::findOrFail($taskListShare->user_id);
            $user->notify(new TaskListDeletedNotification($taskList));

            ResendEmailService::send([
                'to' => $user['email'],
                'subject' => sprintf(NotificationMessages::DELETE_TASK_MESSAGE_EMAIL_SUBJECT, $taskList->name),
                'body' => sprintf(NotificationMessages::DELETE_TASK_MESSAGE_EMAIL_BODY, $taskList->name),
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex->getMessage();
        }
    }
}
