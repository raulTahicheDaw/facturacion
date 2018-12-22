<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'identificacion_fiscal' => [$faker->vat, $faker->dni][random_int(0, 1)],
        'nombre' => $faker->name,
        'nombre_comercial' => [$faker->company, null][random_int(0, 1)],
        'direccion' => $faker->address,
        'codigo_postal' => $faker->postcode,
        'poblacion' => $faker->city,
        'provincia' => $faker->state,
        'pais' => ' España',
        'telefono' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'movil' => $faker->phoneNumber,
        'contacto' => [$faker->firstName, null][random_int(0, 1)],
        'email' => [$faker->email, null][random_int(0, 1)],
        'web' => [$faker->domainName, null][random_int(0, 1)],
        'cuenta_bancaria' => [$faker->iban('es_ES') , null][random_int(0, 1)],
        'banco' => [$faker->company , null][random_int(0, 1)],
        'observaciones' => [$faker->text($maxNbChars = 150), null][random_int(0, 1)]
    ];
});
