<?php

use Illuminate\Database\Seeder;

class SubeventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subevent::class,10)->create();
    }
}
