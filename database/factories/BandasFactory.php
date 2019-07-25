<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Bandas;
use Faker\Generator as Faker;

$factory->define(Bandas::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'imagem' => $faker->name

    ];
});
