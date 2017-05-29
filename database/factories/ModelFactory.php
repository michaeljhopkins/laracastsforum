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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Forum\Channel;
use Forum\User;
use Forum\Thread;
use Forum\Reply;

$factory->define( Channel::class, function (Faker\Generator $faker) {
	$name = $faker->word;
	return [
		'name' => $name,
		'slug' => $name
	];
});
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define( Thread::class, function (Faker\Generator $faker) {
	return [
		'user_id' => function(){
			return factory(User::class)->create()->id;
		},
		'channel_id' => function(){
			return factory(Channel::class)->create()->id;
		},
		'title' => $faker->sentence,
		'body' => $faker->paragraph
	];
});
$factory->define( Reply::class, function (Faker\Generator $faker) {
	return [
		'thread_id' => function(){
			return factory(Thread::class)->create()->id;
		},
		'user_id' => function(){
			return factory(User::class)->create()->id;
		},
		'body' => $faker->paragraph
	];
});
