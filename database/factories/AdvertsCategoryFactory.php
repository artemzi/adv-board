<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Board\Entity\Adverts\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'slug' => $faker->unique()->slug(2),
        'parent_id' => null,
    ];
});
