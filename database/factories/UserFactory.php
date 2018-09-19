<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\SubCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'picture' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
    ];
});

$factory->define(App\Models\MeasureType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'picture' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
    ];
});
$factory->define(App\Models\MeasureUnit::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(),
    ];
});

$factory->define(App\Models\MeasureMale::class, function (Faker $faker) {
    return [
        'bshape' => $faker->randomDigitNotNull,
        'neck'=> $faker->randomDigitNotNull,
        'chest' => $faker->randomDigitNotNull,
        'sleeve' => $faker->randomDigitNotNull,
        'waist' => $faker->randomDigitNotNull,
        'hips' => $faker->randomDigitNotNull,
        'inseam' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Models\MeasureMale::class, function (Faker $faker) {
    return [
        'bshape' => $faker->randomDigitNotNull,
        'bust' => $faker->randomDigitNotNull,
        'bra' => $faker->randomDigitNotNull,
        'waist' => $faker->randomDigitNotNull,
        'hips' => $faker->randomDigitNotNull,
    ];
});