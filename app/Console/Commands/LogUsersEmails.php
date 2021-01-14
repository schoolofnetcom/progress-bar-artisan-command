<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use  App\Models\User;

class LogUsersEmails extends Command
{
    protected $signature = 'run:log';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // temos 10 usuários
        // $users = User::all();
        // $bar = $this->output->createProgressBar(count($users));
        // $bar->start();
        //     foreach($users as $user) {
        //         \Log::info('Usuário: ' . $user->name . " | " . $user->email);
        //         sleep(2);
        //         $bar->advance();
        //     }
        // $bar->finish();

        $users = $this->withProgressBar(User::all(), function($user){
            \Log::info('Usuário: ' . $user->name . " | " . $user->email);
            sleep(1);
        });

    }
}
