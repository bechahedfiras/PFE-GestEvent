<?php

use Illuminate\Database\Seeder;
use App\Faculte;
class FaculteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Faculte::class)->count(10)->create();
        Faculte::factory()->count(10)->create();
    }
}
