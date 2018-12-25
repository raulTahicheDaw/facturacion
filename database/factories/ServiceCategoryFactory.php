<?php

use Faker\Generator as Faker;

$factory->define(App\ServiceCategory::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'descripcion' => $faker->text($maxNbChars = 200)
    ];
});
