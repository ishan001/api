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

    $makes = array_flatten(Make::select('id')->get()->toArray());
    $make = $faker->randomElement($makes);
    $models = array_flatten(Make::find($make)->MakeModels()->select('id')->get()->toArray());
    if($models){
        $model = $faker->randomElement($models);
    } else {
        $model = 0;
    }

    return [
        'user_id' => $faker->numberBetween(1,100),
        'make_id' => $make,
        'model_id' => $model,
        'model_details' => $faker->sentence,
        'year' => $faker->numberBetween(1990,2015),
        'odometer' => $faker->numberBetween(10000,200000),
        'price' => $faker->numberBetween(1,20000),
        'exterior_colour' => $faker->colorName,
        'interior_colour' => $faker->colorName,
        'body_type_id' => $faker->numberBetween(1,9),
        'fuel_type_id' => $faker->numberBetween(1,4),
        'cylinders' => $faker->sentence(2),
        'engine_size' => $faker->sentence(2),
        'transmission_id' => $faker->numberBetween(1,3),
        '4wd' => 'no',
        'owners' => $faker->sentence(2),
        'import_history' => $faker->sentence(2),
        'registration_expire' => $faker->date($format = 'Y-m-d', $startDate = 'now'),
        'wof_expire' => $faker->date($format = 'Y-m-d', $startDate = 'now'),
        'registered' => 'yes',
        'number_plate' => $faker->sentence(1),
        'post_code' => $faker->postcode,
        'city_id' => $faker->numberBetween(1,17),
        'description' => $faker->paragraph ,
    ];
});

$factory->define(App\Api\v1\Models\Image::class, function ($faker) {
    $image = $faker->image('/var/www/api/storage/cars', 640,  480,'cars',false);
    return [
        'is_active' => 1,
        'is_featured' => 0,
        'image_name' => $image,
        'image_path' => 'cars',
        'image_extension' => 'jpg',
        'car_id' => $faker->numberBetween(1,95000)
    ];
});