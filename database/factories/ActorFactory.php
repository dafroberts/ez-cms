<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collections\Actor;
use Faker\Generator as Faker;

$factory->define(Actor::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
