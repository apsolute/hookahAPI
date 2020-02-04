<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\HookahClub;
use Faker\Generator as Faker;

$factory->define(HookahClub::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->sentence
    ];
});
