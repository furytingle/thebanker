<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.09.16
 * Time: 13:12
 */

$factory->define(\App\Customer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'cnp' => $faker->creditCardNumber
    ];
});