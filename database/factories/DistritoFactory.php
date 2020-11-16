<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Places\Distrito;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Distrito::class, function (Faker $faker) {
    return [
        'distrito' => Str::random(10),
        'vehicle_type_id' => 1,
        'category_id' => 1
    ];
});
