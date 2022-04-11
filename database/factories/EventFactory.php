<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'label' => $faker->catchPhrase,
        'price' => $faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
        'lieux' => $faker->state,
        'description' =>$faker->sentence(),
        'photo' => $faker->imageUrl($width = 640, $height = 480) ,
       
      
    ];
});
