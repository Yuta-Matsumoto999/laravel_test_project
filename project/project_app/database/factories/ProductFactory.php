<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'tag_category_id' => $faker->numberBetween(1, 3),
        'name' => $faker->name(),
        'price' => $faker->numberBetween(1000, 30000),
        'content' => $faker->text(),
        'model' => $faker->text(10),
    ];
});