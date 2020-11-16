<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product\Subcategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'nombre' => Str::random(20)
    ];
});
