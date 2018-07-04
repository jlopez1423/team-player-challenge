<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->city
    ];
});

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'team_id'    => function () {
            return factory(App\Team::class)->create()->id;
        },
    ];
});
