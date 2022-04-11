<?php

use Illuminate\Database\Seeder;
use App\Faculte;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   $this->call([RolesTableSeeder::class,
        UsersTableSeeder::class,
        FaculteSeeder::class,
    ]);
       
    }
}
