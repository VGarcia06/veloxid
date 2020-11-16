<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'nombre' => Str::random(20)
    ];
});
