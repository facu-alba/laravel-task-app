<?php

namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

final class ViewAllTaskService
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Task::where('created_by', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
    }
}
