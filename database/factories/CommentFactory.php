<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      'name'=> $faker->name,
      'email'=>$faker->email,
      'subject'=>$faker->sentence(10,15),
      'valid'=> null,
      'message'=>$faker->realText(100),
      'users_id'=>$faker->numberBetween($min=1, $max=App\User::all()->count())
    ];
});
