<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->word(),
        'content' => $faker->text()
    ];
});