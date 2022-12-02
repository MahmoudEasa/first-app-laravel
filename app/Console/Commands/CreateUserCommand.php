<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create {--name=} {--email=} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create New User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->option('name');
        $email = $this->option('email');
        $password = $this->argument('password');

        @$user = User::updateOrCreate([
            'name' => $name,
            'email' => $email,
            'password' => $password ? \bcrypt($password) : \bcrypt('123456'),
        ]);

        if ($user):
            $this->info('user created successfully');
            $this->error('something is wrong');
            $this->comment('something is wrong');
        else:
            $this->error('something is wrong');
        endif;
    }
}