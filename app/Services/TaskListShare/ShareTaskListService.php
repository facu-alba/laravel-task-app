<?php

namespace App\Services\TaskListShare;

use App\Constants\Resend\Messages\NotificationMessages;
use App\Models\TaskList;
use App\Models\TaskListShare;
use App\Models\User;
use App\Notifications\TaskListSharedNotification;
use App\Services\Resend\ResendEmailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

final class ShareTaskListService
{
    /**
     * @var TaskList
     */
    private TaskList $taskList;

    /**
     * @param TaskList $taskList
     */
    public function __construct(TaskList $taskList)
    {
        $this->taskList = $taskList;
    }

    /**
     * @param array $data
     */
    public function share(array $data)
    {
        DB::beginTransaction();

        try {
            $user = User::where('email', $data['email'])->firstOrFail();

            $existingShare = TaskListShare::where('task_list_id', $this->taskList->id)
                ->where('user_id', $user->id)
                ->first();

            if ($existingShare) {
                $existingShare->update([
                    'permission_level' => $data['permission_level'] ?? 'read-only',
                ]);

                $share = $existingShare;
            } else {
                $share = TaskListShare::create([
                    'task_list_id' => $this->taskList->id,
                    'shared_by' => auth()->user()->id,
                    'user_id' => $user->id,
                    'permission_level' => $data['permission_level'] ?? 'read-only',
                    'share_token' => Str::random(32),
                    'token_expires_at' => now()->addDays(30),
                ]);
            }

            $user->notify(new TaskListSharedNotification($this->taskList));

            ResendEmailService::send([
                'to' => $data['email'],
                'subject' => sprintf(NotificationMessages::SHARED_TASK_LIST_MESSAGE, auth()->user()->name),
                'body' => "http://localhost:8000/shared/task-list/" . $share['share_token']
            ]);

            DB::commit();

            return $share;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Error al compartir la lista de tareas: ' . $e->getMessage());
        }
    }
}
