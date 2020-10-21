<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DriverRequirement;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(DriverRequirement::class, function (Faker $faker) {
    return [
        'requerimiento' => Str::random(19)
    ];
});
