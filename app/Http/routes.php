<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/* for rendering documentation */
$app->get('/', function () use ($app) {
    return $app->version();
});


$api = app('Dingo\Api\Routing\Router');

// JWT Protected routes
$api->version('v1', ['middleware' => 'api.auth', 'providers' => 'jwt'], function ($api) {
    $api->get('/index', 'App\Http\Controllers\BackendController@index');
});

$controller_path = 'App\Api\v1\Controllers';
// Publicly accessible routes
$api->version(['v1', 'v2'], [], function ($api) use ($controller_path) {
    /**
     * VERSION 1 routes
     */
    $api->group(['prefix' => 'v1'], function ($api) use($controller_path) {
        $api->get('/cities', $controller_path.'\CommonController@showCities');
        $api->get('/car-makes', $controller_path.'\CommonController@showCarMakes');
        $api->get('/car-models/{make}', $controller_path.'\CommonController@showCarModels');
        $api->get('/features', $controller_path.'\CommonController@showFeatures');

    });

});
