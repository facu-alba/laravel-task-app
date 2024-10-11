<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-user:admin {email : Email of new admin user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');;

        $user = User::create([
            'name' => explode('@', $email)[0],
            'email' => $email,
            'password' => bcrypt($email),
            'created_at' => now(),
        ]);

        $user->assignRole('admin');

        $this->info("New admin user with email: {$email} created.");
    }
}
