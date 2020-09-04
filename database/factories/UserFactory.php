<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Post;
use App\Role;
use App\Category;
use App\Photo;
use App\Comment;
use App\CommentReply;


use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        'email_verified_at' => now(),
        'password' => Hash::make('password'),
        'remember_token' => Str::random(10),
        'photo_id' => $faker->numberBetween(1,20),
        'is_active' => $faker->numberBetween(1,2),
        'role_id' => $faker->numberBetween(1,3),
        'created_at' => now(),
        'updated_at' => now()
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3,5),
        'slug' => $faker->slug,
        'body' => $faker->paragraph(rand(5,10), true),
        'category_id' => $faker->numberBetween(1,3),
        'status' => 1,
        'photo_id' => $faker->numberBetween(13,21),
        // 'user_id' => $faker->numberBetween(1,9),
        'created_at' => now(),
        'updated_at' => now()
    ];
});


$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Admin', 'Subscriber', 'Author']),
        'created_at' => now(),
        'updated_at' => now()
    ];
});


$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Sports', 'Nature', 'Creativity', 'UpLife', 'Others', 'Daily']),
        'created_at' => now(),
        'updated_at' => now()
    ];
});

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'name' => 'placeholder.jpg',
        'created_at' => now(),
        'updated_at' => now()
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(1,true),
        'post_id'=> $faker->numberBetween(1,10),
        'email'=> $faker->safeEmail,
        'is_active' => $faker->numberBetween(1,2),
        'photo' => '/images/default.png',
        'author' => $faker->name,
        'created_at' => now(),
        'updated_at' => now()
    ];
});



$factory->define(CommentReply::class, function (Faker $faker) {
    return [
        'reply' => $faker->sentence(7,9),
        'comment_id'=> $faker->numberBetween(1,10),
        'email'=> $faker->safeEmail,
        'is_active' => $faker->numberBetween(1,2),
        'photo' => '/images/default.png',
        'author' => $faker->name,
        'created_at' => now(),
        'updated_at' => now()
    ];
});


