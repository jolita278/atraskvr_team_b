<?php

namespace App\Console\Commands;

use App\Models\VRUsers;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

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

    public function handle()
    {
        //$this->comment('Scanning items');
        $email = $this->ask('please provide email');
        $this->info($email);
        $username = $this->ask('please provide user name');
        $this->info($username);
        $firstname = $this->ask('please provide first name');
        $this->info($firstname);
        $lastname = $this->ask('please provide last name');
        $this->info($lastname);
        $password = $this->ask('please provide password');
        $this->info($password);

        $record = VRUsers::create(array(
            'id' => Uuid::uuid4(),
            'user_name' => $username,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => bcrypt($password),
        ));

        $record->rolesConnectionData()->sync('super-admin');
    }
}
