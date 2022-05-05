<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Subevent;
use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        
        'label' => $faker->catchPhrase,
        'price' => $faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
        
        'dateevent'=> $faker->date($format = 'Y/m/d', $max = 'now') ,
        'lieux' => $faker->state,
        'description' =>$faker->sentence(),
        'photo' => $faker->imageUrl($width = 640, $height = 480) ,
    
        
      
    ];
});
