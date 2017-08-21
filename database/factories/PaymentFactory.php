<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 19.08.2017
 * Time: 13:28
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Payment::class, function (Faker\Generator $faker) {

    return [
//        'name' => $faker->name,
        'expense_id' => function() {
            return App\Expense::inRandomOrder()->first();
        },
//        'assent' => $faker->numberBetween(-1, 1),
        'amount' => $faker->randomFloat(2, 1, 3000),
    ];
});
