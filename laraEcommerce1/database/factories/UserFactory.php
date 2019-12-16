<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Meeting;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Meeting::class, function (Faker $faker) {
    return [
        'meetingName' => $faker->word,
        'categoryId' => 2,
        'shortDescription' => $faker->text,
        'longDescription' => $faker->text,
        'pic' => 'meetingImage/18ami.PNG',
        'publicationStatus' =>1,
    ];
});
