<?php

use Faker\Generator as Faker;

$factory->define(App\Testimonial::class, function (Faker $faker) {
    return [
        'message'=>$faker->sentence(5,15),
        'valid' => null,
    ];
});
