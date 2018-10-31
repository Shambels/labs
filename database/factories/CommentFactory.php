<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      'name'=> $faker->name,
      'email'=>$faker->email,
      'content'=>$faker->sentence(10,15),
      'valid'=> null
    ];
});
