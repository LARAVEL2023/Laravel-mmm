<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'deleted_at' => $this->faker->date(),
        'roll_id' => 1,
        'name' => $this->faker->name(),
        'number' => $this->faker->phonenumber(),
        'email' => $this->faker->email(),
        'password' => $this->faker->password()
    ];
});
