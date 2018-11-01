<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'title'=>$faker->title,
        'company'=>$faker->company,
        'image' =>$faker->imageUrl($width = 60, $height=60),
        'valid'=>null
    ];
});
