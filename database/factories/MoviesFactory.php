<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Movie;

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

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(150),
        'director' => $faker->firstName,
        'imageUrl' => $faker->imageUrl(150, 150),
        'duration' => rand(20, 300),
        'releaseDate' => $faker->dateTime(),
        'genre' => Movie::genres[rand(0, count(Movie::genres)-1)]
    ];
});
