<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        //
        'weight'=>$faker->numberBetween(45, 105),
        'height'=>$faker->numberBetween(155, 210),
        'user_id'=>$faker->numberBetween(15, 30)
    ];
});
