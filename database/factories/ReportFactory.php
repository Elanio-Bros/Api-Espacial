<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'external_id' => $faker->randomNumber(1),
        'title' => $faker->title(),
        'url' => $faker->url(),
        'summary' => $faker->realText(),
    ];
});
