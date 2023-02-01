<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ChangeRoleOfUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:change-role {email} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change the role of user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::query()
            ->where('email', $email)
            ->first();

        if (!$user) {
            $this->error('This user is not registered');
            return self::FAILURE;
        }

        $user->role = $this->argument('role');
        $user->save();

        $this->info('Successfully changed role');

        return self::SUCCESS;
    }
}
