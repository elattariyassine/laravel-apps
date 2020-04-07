<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \App\Faker\Provider\PicsumImage($faker));

    return [
        'title' => $faker->sentence(2),
        'description' => $faker->text(100),
        'content' => $faker->text(5000),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'category_id' => $faker->numberBetween($min = 2, $max = 3),
        'user_id' => $faker->numberBetween($min = 1, $max = 3)
    ];
});
