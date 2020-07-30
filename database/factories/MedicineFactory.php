<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medicine;
use Faker\Generator as Faker;

$factory->define(Medicine::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->randomElement(['اسپرین', 'دیکلوفناک','فلوکستین','کدوئین','فارژینک','سالوی گل','پروپانولول','ویتامین D','دیزپرامین','ترانزامیک اسید','کلد استاپ','انتی هیستامین','هماتینیک','ستریزین','ترنیسیت','ایبو پروفین', ]),
        'amount'=>$faker->randomElement(['روزی دو وعده', 'روزی یک وعده', 'روزی سه وعده', 'هر هشت ساعت', 'هر 12 ساعت', 'روزی یک بار', 'هر 24 ساعت']),
        'instruction'=>$faker->text(),
        'visit_id'=>$faker->numberBetween(1, 50)
    ];
});
