<?php

use Faker\Generator as Faker;

$factory->define(App\Rate::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'descripcion' => $faker->text($maxNbChars = 200),
        'precio_hora' => $faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 30)
    ];
});
