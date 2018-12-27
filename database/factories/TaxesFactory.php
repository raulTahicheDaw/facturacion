<?php

use Faker\Generator as Faker;

$factory->define(App\Taxes::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'observaciones' => $faker->text($maxNbChars = 200),
        'porcentaje' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 15)
    ];

});
