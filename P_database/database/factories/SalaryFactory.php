<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salary;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    return [
        //
        'base_salary'=>$faker->numberBetween(5000000, 10000000),
        'reward'=>$faker->numberBetween(5000000, 10000000),
        'child_allowance'=>$faker->numberBetween(5000000, 10000000),
        'have_salary_id'=>$faker->numberBetween(1, 20),
        'month'=>$faker->randomElement(['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند',]),
        'year'=>$faker->numberBetween(95, 99),
        'have_salary_type'=>$faker->randomElement(['App\Employee', 'App\Doctor'])
    ];
});
