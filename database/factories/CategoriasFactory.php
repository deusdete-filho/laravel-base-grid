<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Categorias;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(Categorias::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
