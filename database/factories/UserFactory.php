<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'gender' => (rand(0,1) ? "male" : "female"),
        'bio' => $faker->sentence,
        'email_verified_at' => now(),
        'password' => bcrypt('apstbn'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Status::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'owner_id' => rand(1, 3),
    ];
});