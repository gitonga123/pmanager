<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);
//        factory(\pmanager\User::class, 50)->create();
        factory(\pmanager\Company::class, 20)->create();
    }
}
