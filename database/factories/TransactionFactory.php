<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.09.16
 * Time: 13:15
 */

$factory->define(\App\Transaction::class, function (\Faker\Generator $faker) {
    return [
        'amount' => $faker->numberBetween(5, 9999),
        'customerId' => function () {
            return factory(\App\Customer::class)->create()->id;
        }
    ];
});