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

$factory->define(pmanager\User::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'roles' => 0
    ];
});

$factory->define(pmanager\Company::class, function (Faker $faker) {

    return [
        'name' => $faker->company,
        'description' => $faker->paragraph,
        'user_id' => $faker->randomDigit
    ];
});

$factory->define(pmanager\Project::class, function (Faker $faker) {

    return [
        'name' => $faker->words,
        'description' => $faker->paragraph,
        'user_id' => $faker->randomDigit,
        'company_id' => $faker->randomDigit,
        'days' => $faker->randomDigit
    ];
});