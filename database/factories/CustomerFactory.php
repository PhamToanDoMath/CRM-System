<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phoneNumber' => $faker->unique()->phoneNumber,
        'address' => $faker->unique()->address,
        'created_at' => now(),
    ];
});
