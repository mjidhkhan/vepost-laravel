<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
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
    $cip = geoip()->getClientIP();
    $geoip= geoip()->getLocation('81.130.214.29');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username'=>$faker->unique()->username,
        'vep_code'=>'233',
         'vepost_address' => '233'.country(strtolower($geoip['iso_code']))->getCallingCode().'07454644765',
        'display_name'=>$faker->firstName(),
        'country_code'=>country(strtolower($geoip['iso_code']))->getCallingCode(),
        'phone'=>$faker->phoneNumber,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];


    
});

