<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'avatar' => $faker->imageUrl(300, 300, 'people')
    ];
});


$factory->define(App\Galeria::class, function(Faker $faker) {
  return [
    'title' => $faker->realText(random_int(15, 130)),
    'content' => $faker->realText(),
    'image' => $faker->imageURl(600, 338),
    'created_at' => $faker->dateTimeThisDecade,
    'updated_at' => $faker->dateTimeThisDecade
  ];
});


$factory->define(App\Response::class, function(Faker $faker) {
  return [
    'message' => $faker->words(3, true),
    'created_at' => $faker ->dateTimeThisYear,
    'updated_at' => $faker ->dateTimeThisYear
  ];
});