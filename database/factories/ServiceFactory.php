<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'name'=> $faker->bs,
        'content'=> $faker->sentence($nbWords = 15, $variableNbWords = false),
        // 'content'=> $faker->text($maxNbChars = 90),
        'valid'=>null,
        'icons_id'=>mt_rand(1, 49)

    ];
});


