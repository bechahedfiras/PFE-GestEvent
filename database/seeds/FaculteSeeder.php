<?php

use App\Faculte;
use Illuminate\Database\Seeder;

class FaculteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Faculte::class,10)->create();
        // Faculte::factory()->count(10)->create();
    }
}
