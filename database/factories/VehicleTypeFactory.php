<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VehicleType;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(VehicleType::class, function (Faker $faker) {
    return [
        'nombre' => Str::random(10),
        'tipo' => Str::random(14)
    ];
});
