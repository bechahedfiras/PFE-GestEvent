<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faculte;
use App\Factory;
use Faker\Generator as Faker;

$factory->define(Factory::class, function (Faker $faker) {
    return [

        'label' => $faker->cityPrefix ,
        'created_at' => now(),
        'updated_at' => now(),
       
     
     
    
    ];
});
