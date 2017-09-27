<?php

$factory->define(\App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'confirmed' => false
    ];
});
$factory->define(\App\Thread::class, function ($faker) {
    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'channel_id' => function () {
            return factory(\App\Channel::class)->create()->id;
        },
        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
        'visits' => 0
    ];
});
$factory->define(\App\Channel::class, function ($faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => $name
    ];
});
$factory->define(\App\Reply::class, function ($faker) {
    return [
        'thread_id' => function () {
            return factory(\App\Thread::class)->create()->id;
        },
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'body'  => $faker->paragraph
    ];
});
$factory->define(\Illuminate\Notifications\DatabaseNotification::class, function ($faker) {
    return [
        'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        'type' => 'App\Notifications\ThreadWasUpdated',
        'notifiable_id' => function () {
            return auth()->id() ?: factory(\App\User::class)->create()->id;
        },
        'notifiable_type' => \App\User::class,
        'data' => ['foo' => 'bar']
    ];
});