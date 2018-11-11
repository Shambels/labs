<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'title'=>$faker->title,
        'company'=>$faker->company,
        'image' =>'0'.rand(1,3).'.jpg',
        'valid'=>true
    ];
});
