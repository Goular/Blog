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

$factory->define(App\Entities\AdminUser::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\FriendLink::class,function (Faker $faker){
    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'url' => $faker->url,
        'order' => $faker->numberBetween(0,1000),
    ];
});

$factory->define(App\Entities\Navigation::class,function (Faker $faker){
    return [
        'name' => $faker->name,
        'alias' => $faker->title,
        'url' => $faker->url,
        'order' => $faker->numberBetween(0,1000),
    ];
});