<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hookah;
use App\Models\HookahClub;
use Faker\Generator as Faker;

$factory->define(Hookah::class, function (Faker $faker){
    return [
        'name' => $faker->sentence,
        'pipes_count' => $faker->biasedNumberBetween(1,6)
    ];
});
