<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collections\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'release_date' => $faker->date(),
    ];
});
