<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin 1',
            'email' => 'demo.admin.1@improveet.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name' => 'Admin 2',
            'email' => 'demo.admin.2@improveet.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name' => 'Admin 3',
            'email' => 'demo.admin.3@improveet.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');
    }
}
