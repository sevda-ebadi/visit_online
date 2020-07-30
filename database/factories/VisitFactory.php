<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visit;
use Faker\Generator as Faker;

$factory->define(Visit::class, function (Faker $faker) {
    return [
        //
        'time'=>$faker->dateTime(),
        'date'=>$faker->dateTime(),
        'status'=>$faker->numberBetween(1, 5),
//        'day'=>$faker->numberBetween(1, 31),
//        'hour'=>$faker->numberBetween(0, 24),
//        'min'=>$faker->randomElement(['0, 15', '30', '45']),
//        'day_of_week'=>$faker->randomElement(['شنبه', 'یک شنبه', 'دو شنبه' ,'سه شنبه', 'چهار شنبه', 'پنج شنبه', 'جمعه']),
        'price'=>$faker->numberBetween(1000, 50000),
        'doctor_id'=>$faker->numberBetween(1, 20),
        'patient_id'=>$faker->numberBetween(1, 20)
    ];
});
