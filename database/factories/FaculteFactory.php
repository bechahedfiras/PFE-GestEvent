<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faculte;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Faculte::class, function (Faker $faker) {
    return [

        'label' => $faker->cityPrefix ,
        'created_at' => now(),
        'updated_at' => now(),
       
     
     
    
    ];
});
