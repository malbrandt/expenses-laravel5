<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 19.08.2017
 * Time: 13:28
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Expense::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->sentence(3),
        'description' => $faker->sentence(10),
        'user_id' => function() {
            return App\User::inRandomOrder()->first();
        },
        'amount' => $faker->randomFloat(2, 10, 10000),
    ];
});