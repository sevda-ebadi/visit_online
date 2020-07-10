<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    return [
        //
        'number_of_bed'=>$faker->numberBetween(5, 60),
        'name'=>$faker->randomElement(['داخلی','ای سی یو','سی سی یو','اورژانس','زنان و زایمان','کودکان','بیماران عفونی']),
        'clinic_id'=>$faker->unique()->numberBetween(1, 50)
    ];
});
