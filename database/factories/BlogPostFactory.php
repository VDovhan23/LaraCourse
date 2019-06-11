<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\BlogPost::class, function (Faker $faker) {

    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 3000));
    $is_published = rand(1,5)>1;

    $timestamp_date = $faker->dateTimeBetween('-3 months', '-2 months');

    $data = [
        'category_id'       => rand(1, 10),
        'user_id'           => (rand(1,5)==5) ? 1 :2,
        'title'             => $title,
        'slug'              => str_slug($title),
        'excerpt'           => $faker->text(rand(40, 100)),
        'content_raw'       => $txt,
        'content_html'      => $txt,
        'is_published'      => $is_published,
        'published_at'      => $is_published ? $faker->dateTimeBetween('-2 months', '-1days') :null,
        'created_at'        => $timestamp_date,
        'updated_at'        => $timestamp_date,
    ];

    return $data;

});
