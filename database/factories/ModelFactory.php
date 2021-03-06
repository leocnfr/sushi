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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'nom' => $faker->name,
        'prenom'=>$faker->name,
        'email' => $faker->safeEmail,
        'tel'=>$faker->phoneNumber,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(10,20),
        'count'=>$faker->numberBetween(5,10),
        'content'=>join("\n\n",$faker->paragraphs(mt_rand(3,6))),
        'productImage'=>$faker->imageUrl(255,255),
    ];
});
