<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskListShare extends Model
{
    use HasFactory;

    protected $fillable = ['task_list_id', 'shared_by', 'user_id', 'permission_level', 'share_token', 'token_expires_at'];

    protected $casts = [
        'token_expires_at' => 'datetime',
    ];

    public function taskList(): BelongsTo
    {
        return $this->belongsTo(TaskList::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
