<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'name' => 'Task 1',
            'description' => 'Task 1 description',
            'completed' => false,
            'task_list_id' => 1,
            'created_by' => 1,
            'created_at' => now(),
        ]);
    }
}
