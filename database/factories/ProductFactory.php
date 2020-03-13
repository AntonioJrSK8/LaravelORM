<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => implode(' ', $faker->paragraphs ),
        'ativo' => rand(0,1)
    ];
});
