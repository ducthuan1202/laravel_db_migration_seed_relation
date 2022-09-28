<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Issue;
use Faker\Generator as Faker;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'lastName' => $faker->lastName(),
        'age' => $faker->numberBetween(1, 70),
        'is_male' => $faker->boolean,
        'options' => [
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country,
        ]
    ];
});
