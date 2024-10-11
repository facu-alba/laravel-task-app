<?php

namespace Database\Seeders;

use App\Models\TaskList;
use Illuminate\Database\Seeder;

class TaskListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskList::create([
            'name' => 'Task list 1',
            'description' => 'Task list 1 description',
            'user_id' => 1,
            'created_at' => now(),
        ]);
    }
}
