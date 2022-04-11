<?php

use Illuminate\Database\Seeder;
use App\Faculte;
use App\Event;
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
        EventSeeder::class,
    ]);
       
    }
}
