<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entry;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Entry::class, function (Faker $faker) {
    $rand_sec = rand(2, 8) * 3600;

    $out_time = $faker->dateTimeThisMonth($max = 'now', $timezone = 'UTC')->getTimestamp();
    $in_time = $out_time - $rand_sec;
    $total = $rand_sec;

    $user = User::whereRoleId('3')->inRandomOrder()->first();
    $centre = $user->centres->first();

    return [
        'user_id' => $user->id,
        'centre_id' => $centre->id,
        'in_time' => $in_time,
        'out_time' => $out_time,
        'total' => $total
    ];
});
