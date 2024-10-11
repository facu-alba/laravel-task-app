<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $viewTask   = Permission::create(['name' => 'view.task']);
        $updateTask = Permission::create(['name' => 'update.task']);
        $deleteTask = Permission::create(['name' => 'delete.task']);

        $viewTask->assignRole('admin');
        $updateTask->assignRole('admin');
        $deleteTask->assignRole('admin');
    }
}
