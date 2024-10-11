<?php

namespace App\Services\Task;

use App\Constants\Resend\Messages\NotificationMessages;
use App\Models\Task;
use App\Models\TaskListShare;
use App\Models\User;
use App\Notifications\NewTaskAddedNotification;
use App\Services\Resend\ResendEmailService;

final class StoreTaskService
{
    public function __construct() {}

    /**
     * @param array $task
     * 
     * @return
     */
    public function store(array $task): void
    {
        Task::create([
            'name' => $task['name'],
            'description' => $task['description'],
            'task_list_id' => $task['task_list_id'],
            'created_by' => auth()->user()->id,
        ]);

        $this->notifyToUserWhoSharedTheList($task['name']);
    }

     /**
     * @param string $taskName
     * 
     * @return void
     */
    private function notifyToUserWhoSharedTheList(string $taskName): void
    {
        $taskListShare = TaskListShare::join('task_lists', 'task_list_shares.task_list_id', '=', 'task_lists.id')
            ->where('task_list_shares.user_id', auth()->user()->id)
            ->where('task_list_shares.permission_level', 'edit')
            ->select('task_lists.id', 'task_lists.name', 'task_lists.user_id')
            ->orderBy('task_lists.created_at', 'DESC')
            ->first();

        $task = Task::where('name', $taskName)->first();

        $user = User::findOrFail($taskListShare->user_id);
        $user->notify(new NewTaskAddedNotification($task));

        ResendEmailService::send([
            'to' => $user['email'],
            'subject' => sprintf(NotificationMessages::STORE_TASK_MESSAGE_EMAIL_SUBJECT, $taskListShare->name),
            'body' => sprintf(NotificationMessages::STORE_TASK_MESSAGE_EMAIL_BODY, $task->name),
        ]);
    }
}
