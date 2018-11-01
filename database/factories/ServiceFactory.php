<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'name'=> $faker->bs,
        'content'=> $faker->sentence($nbWords = 17, $variableNbWords = false),
        'valid'=>null,
        'icons_id'=>mt_rand(1, 40)

    ];
});


