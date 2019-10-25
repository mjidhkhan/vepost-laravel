<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});

User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => bcrypt('secret'),
]);
