<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create-admin {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');

        if (User::query()->where('email', $email)->exists()) {
            $this->error('User with this email is already exists');

            return self::FAILURE;
        }

        $user = new User();
        $user->name = $this->argument('name');
        $user->email = $email;
        $user->password = Hash::make($this->argument('password'));
        $user->role = User::ADMIN;
        $user->save();

        $this->info('Admin user successfully created');

        return self::SUCCESS;
    }
}
