<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(rand(3,15)),
        'preview' => $faker->sentence(rand(15,20)),
        'content' => $faker->sentence(rand(50,100)),
        'valid' => true,
        'image' => 'blog-default.jpg'
    ];
});
