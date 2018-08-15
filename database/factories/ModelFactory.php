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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\AuthUser\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'verified' => true
    ];
});


$factory->define(\CodeEduBook\Models\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => ucfirst($faker->unique()->word),
    ];
});


$factory->define(\CodeEduBook\Models\Book::class, function (Faker\Generator $faker){
    $users = app(\AuthUser\Repositories\UserRepository::class);
    $userId = $users->all()->random()->id;

   return [
     'title' =>  $faker->sentence(4, true),
       'subtitle' => $faker->paragraph(2, true),
       'price' => $faker->randomFloat(2, 1, 1000),
       'user_id' => $userId
   ];
});