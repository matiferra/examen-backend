<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Entrenador::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name
    ];
});
