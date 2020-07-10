<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        //
        'user_id'=>$faker->numberBetween(40, 50),
        'section_id'=>$faker->numberBetween(1, 10),
        'number_of_child'=>$faker->numberBetween(0, 5),
        'marriage'=>$faker->numberBetween(0,1),
        'degree'=>$faker->randomElement(['لیساس', 'فوق دیپلم', 'کارشناس ارشد']),
        'type'=>$faker->randomElement(['پرستار', 'نگهبان', 'تزریقات', 'ماما', 'خدمات', 'اشپز'])
    ];
});
