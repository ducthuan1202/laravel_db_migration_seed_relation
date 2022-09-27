<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $category = Category::first();
    return [
        'title' => $faker->text(100),
        'category_id' => $category->id,
        'status' => 'draft',
        'views' => 1202,
        'is_feature' => true,
    ];
});
