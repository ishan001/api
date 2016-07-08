<?php
use App\Api\v1\Models\Make;
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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});


$factory->define(App\Api\v1\Models\Car::class, function ($faker) {

    $makes_array = Make::select('id')->get()->toArray();

    list($keys, $values) = array_divide($makes_array['id']);
    print_r($keys);
    print_r($values);
    die();
    $make = $faker->randomElement($makes);

    $models = Make::find($make)->MakeModels;

    $model = $faker->randomElement($models);

    return [
        'user_id' => $faker->numberBetween(1,50),
        'make_id' => $make,
        'model_id' => $model,
        'model_details' => $faker->sentence,
        'year' => $faker->numberBetween(1990,2015),
        'odometer' => $faker->numberBetween(0,200000),
        'price' => $faker->numberBetween(0,20000),
        'exterior_colour' => $faker->colorName,
        'interior_colour' => $faker->colorName,
        'body_type_id' => $faker->numberBetween(0,4),
        'fuel_type_id' => $faker->numberBetween(0,4),
        'cylinders' => $faker->words(2),
        'engine_size' => $faker->words(2),
        'transmission_id' => $faker->numberBetween(0,4),
        '4wd' => 'No',
        'owners' => $faker->words(2),
        'import_history' => $faker->words(2),
        'registration_expire' => $faker->date($format = 'Y-m-d', $startDate = 'now'),
        'wof_expire' => $faker->date($format = 'Y-m-d', $startDate = 'now'),
        'registered' => 'yes',
        'number_plate' => $faker->realText(6),
        'post_code' => $faker->postcode,
        'suburb' => $faker->state,
        'description' => $faker->paragraph ,
    ];
});

