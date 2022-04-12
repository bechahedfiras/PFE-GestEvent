<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subevent;
use Faker\Generator as Faker;

$factory->define(Subevent::class, function (Faker $faker) {
    return [
        'label' => $faker->sentence(),
        'price' => $faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
        'description' =>$faker->sentence(),
        'photo' => $faker->imageUrl($width = 640, $height = 480) ,
    ];
});
