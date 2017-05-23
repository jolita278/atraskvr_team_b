<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AdminCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make super admin user';

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
     * @return mixed
     */

        public function handle(){
        //$this->comment('Scanning items');
        $email = $this->ask('please provide email');
        $this->info($email);
        $name = $this->ask('please provide name');
        $this->info($name);
        $password = $this->ask('please provide password');
        $this->info($password);
/*
        $record = ::create(array(
            'id' => Uuid::uuid4(),
            'name' => $name,
            'email' => $email,
            'password' => bcrypt( $password),
        ));*/

       //$record->rolesConnectionData()->sync('super-admin','member');
    }
}
