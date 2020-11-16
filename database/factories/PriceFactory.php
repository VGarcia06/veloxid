<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Price;
use Faker\Generator as Faker;

$factory->define(Price::class, function (Faker $faker) {
    return [
        'price' => rand(50, 100)
    ];
});
