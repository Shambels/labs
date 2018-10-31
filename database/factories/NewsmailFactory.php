<?php

use Faker\Generator as Faker;

$factory->define(App\Newsmail::class, function (Faker $faker) {
    return [
        'email'=>$faker->email
    ];
});
