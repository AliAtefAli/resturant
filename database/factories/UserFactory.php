<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
        'name' => 'User name',
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->numberBetween(111111111, 999999999),
        'password' => bcrypt(123456789),
        'remember_token' => Str::random(10),
        'address' => 'المملكة العربية السعودية , الرياض',
    ];
});
