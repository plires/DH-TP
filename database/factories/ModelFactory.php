<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstname,
        'surname' => $faker->lastname,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'document_id' => rand(1, 4),
        'document' => rand(22855617, 30452685),
        'phone' => $faker->phoneNumber,
        'src' => $faker->imageUrl($width = 300, $height = 300),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
      'name' => $name = $faker->name,
      'slug' => str_slug($name)
    ];
});

$factory->define(App\DocumentType::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->name
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
      'product_id' => rand(1, 30),
      'src' => $faker->imageUrl($width = 640, $height = 480)
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

  $title = $faker->text;

    return [
        'title' => $title,
        'slug'  => str_slug($title),
        'description' => implode(' ', $faker->paragraphs(5)),
        'price' => $faker->randomNumber(2),
        'image_id' => rand(1, 30),
        'category_id' => rand(1, 4),
        'user_id' => rand(1, 2),
        'available' => rand(1, 20)
    ];
});

/*
$factory->define(App\User::favorites(), function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1, 2),
        'product_id' => rand(1, 2),
    ];
});
*/



