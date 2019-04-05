<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'status' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'is_admin' => 0,
        'avatar' => 'author.png'
    ];
});

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 15, $indexSize = 2),
        'content' => $faker->realText($maxNbChars = 300, $indexSize = 2),
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'image' => 'photo1.png',
        'date' => $faker->date($format = 'd/m/y', $max = 'now'),
        'views' => $faker->numberBetween(0,5000),
        'category_id' => $faker->numberBetween(1,4),
        'user_id' => $faker->numberBetween(2,9),
        'status' => 1,
        'is_featured' => 0
    ];
});

$factory->define(   \App\Category::class,function (Faker $faker){
	return[
		'title' => $faker->realText($maxNbChars = 10, $indexSize = 2)
	];
});

$factory->define(   \App\Tag::class,function (Faker $faker){
	return[
		'title' =>$faker->realText($maxNbChars = 10, $indexSize = 2)
	];
});
