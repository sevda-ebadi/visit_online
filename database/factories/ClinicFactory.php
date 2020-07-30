<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clinic;
use Faker\Generator as Faker;

$factory->define(Clinic::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->randomElement(['بیمارستان دهخدا','بیمارستان پاستور','کلینیک تامین اجتماعی','بیمارستان بوعلی','بیمارستان قدس','کلینک آینده','بیمارستان ولایت','بیمارستان بصیر','بیمارستان نور','کلینیک امروز']),
        'address'=>$faker->address,
    ];
});
