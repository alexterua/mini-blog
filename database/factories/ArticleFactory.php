<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {

    $title = Str::title($faker->realText(rand(10, 50)));
    $short_title = \Illuminate\Support\Str::length($title) > 20 ? Str::limit($title, 20) : $title;
    $created = $faker->dateTimeBetween('-60 days', '-1 days');
    $text = $faker->realText(rand(200, 500));

    return [
        'title' => $title,
        'short_title' => $short_title,
        'author_id' => rand(1, 4),
        'text' => $text,
        'created_at' => $created,
        'updated_at' => $created,
    ];
});
