<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VehicleRequirement;
use Faker\Generator as Faker;

$factory->define(VehicleRequirement::class, function (Faker $faker) {
    return [
        'requerimiento' => Str::random(19)
    ];
});
