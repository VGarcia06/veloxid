<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Places\Zona;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Zona::class, function (Faker $faker) {
    return [
        'zona' => Str::random(10)
    ];
});
