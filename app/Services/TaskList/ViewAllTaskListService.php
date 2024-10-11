<?php

namespace App\Services\TaskList;

use App\Models\TaskList;
use Illuminate\Database\Eloquent\Collection;

final class ViewAllTaskListService
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return TaskList::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
    }
}
