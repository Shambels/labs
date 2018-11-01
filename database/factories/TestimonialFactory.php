<?php

use Faker\Generator as Faker;

$factory->define(App\Testimonial::class, function (Faker $faker) {
    return [
        'message'=>$faker->sentence(10,30),
        'valid' => null,
    ];
});
