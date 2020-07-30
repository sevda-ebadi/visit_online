<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Doctor;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'field' => $faker->randomElement(['کارشناس تغذیه', 'جراح مغز و اعصاب', 'پزشک عمومی', 'پزشک داخلی', 'گوش و حلق و بینی', 'متخصص ارولوژی', 'ارتوپد', 'دندان پزشک', 'پزشک قلب', 'روانشناس', 'پزشک غدد']),
        'degree'=>$faker->randomElement(['تخصص', 'فوق تخصص', 'فوق لیسانس', 'دکتر', 'لیسانس']),
        'number_of_child'=>$faker->numberBetween(0, 5),
        'marriage'=>$faker->numberBetween(0,1),
        'user_id'=>$faker->numberBetween(1, 15)
    ];
});
