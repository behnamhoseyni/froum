<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\thread::class,function (Faker $faker){
   return
       [
        'user_id'=>function(){
         return factory('App\Model\User')->create()->id;
        },
        'channel_id'=>function(){
         return factory('App\Model\Channel')->create()->id;
        },
        'title'=>$faker->sentence,
        'body'=>$faker->paragraph,
       ];
});

$factory->define(App\Model\Channel::class,function (Faker $faker){
    $name=$faker->word;

    return
        [
            'name' => $name,
            'slug' => $name
        ];
});


$factory->define(App\Model\Reply::class,function (Faker $faker){
    return
        [
            'thread_id'=>function(){
                return factory('App\Model\thread')->create()->id;
            },
            'user_id'=>function(){
                return factory('App\Model\User')->create()->id;
            },
            'body'=>$faker->paragraph,
        ];
});
